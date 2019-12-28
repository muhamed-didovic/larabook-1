<?php
require_once __DIR__.'/vendor/autoload.php';

use Robo\Tasks;

class RoboFile extends Tasks
{
    public function sayHello()
    {
        // $codePage = exec('chcp');
        // if($codePage != '65001')
        // {
        //     $this->say("sorry no utf-8 support for you. chcp is {$codePage}");
        //     //output:  sorry no utf-8 support for you. chcp is Active code page: 437
        //     $this->say("Making things right");
        //     exec('chcp 65001');
        //     $this->say('You should see an arrow now');
        //     // output: ➜  You should see an arrow now
        //     $this->yell('FOOBAR!');
        //     /* output
        //     ➜
        //     ➜                 FOOBAR!
        //     ➜
        //     */
        //     $this->ask('Now let me ask you a question');
        //     //output: ?  Now let me ask you a question
        // }

        echo "\[1;30;40mλ";
    }
}
