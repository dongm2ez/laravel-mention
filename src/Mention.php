<?php

namespace Dongm2ez\Mention;

class Mention
{
   protected $bodyParse;
    protected $users = [];
    protected $userNames;
    protected $bodyOriginal;
    protected $routeStr;

    /**
     * Mention constructor.
     */
    public function __construct()
    {
        $this->routeStr = config('mention.route_name', 'users.show');
    }

    /**
     * @param $body
     * @return mixed
     */
    public function parse($body)
    {
        $this->bodyOriginal = $body;

        $this->userNames = $this->mentionedUser();

        if (count($this->userNames) > 0) {
            $model = app()->make(config('mention.users.model', 'App\Models\UserProfile'));
            $this->users = $model::whereIn('name', $this->userNames)->get();
        }

        $this->replace();

        return $this->bodyParse;
    }

    /**
     * @return array
     */
    protected function mentionedUser()
    {
        $regex = config('mention.regex', "/(\S*)\@([^\r\n\s]*)/i");

        preg_match_all($regex, $this->bodyOriginal, $atListTmp);
        $userNames = [];
        foreach ($atListTmp[2] as $key => $value) {
            if ($atListTmp[1][$key]) {
                continue;
            }
            $userNames[] = $value;
        }

        return array_unique($userNames);
    }

    /**
     *
     */
    protected function replace()
    {
        if (config('mention.format', 'html') == 'html') {
            $this->replaceHtml();
        } else {
            $this->replaceMarkdown();
        }
    }

    /**
     *
     */
    protected function replaceMarkdown()
    {
        $tempBody = $this->bodyOriginal;
        foreach ($this->users as $user) {
            $userName = config('mention.users.column', 'name');
            $search = '@' . $user->{$userName};
            $place = '[' . $search . '](' . route($this->routeStr, $user->id) . ')';
            $this->bodyParse = $tempBody = str_replace($search, $place, $tempBody);
        }
    }

    /**
     *
     */
    protected function replaceHtml()
    {
        $tempBody = $this->bodyOriginal;
        foreach ($this->users as $user) {
            $userName = config('mention.users.column', 'name');
            $search = '@' . $user->{$userName};
            $place = '<a href="' . route($this->routeStr, $user->id) . '" data-namecard="' . $user->{$userName} . '" target="_blank">' . $search . '</a>';
            $this->bodyParse = $tempBody = str_replace($search, $place, $tempBody);
        }
    }

}
