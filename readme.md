## Larabook

Working along with Jeffrey Way's awesome course on laracasts.com

This version is bound to become very much modified from the original source because I just can't help myself. I have to mess around with things :-)

# Up to date with designing statuses episode

![Build Passing](http://cdn.memegenerator.net/instances/200x/52578731.jpg)

# Notes:
- added user repository integration test
- location of codeceptions files is different (see codeception.yml and app/tests dir)
- extra directory for the user model app/larabook/Entities/User
- added placeholder gravitar beside dropdown for user settings
- Using {{ escaped }} and {{{ non escaped }}} (see top of start/global.php)
- Different route names than used in the course (see the routes.php file)
- also put in route groups and applied csrf to the post routes (might want to reorganize because its ugly)
- ignore the t2s.sh file in the root unless you want to convert all tabs to spaces excluding the vendor directory. 
- also ignore .editorconfig file because I'm not 100% certain I have it setup right and it's also for using spaces instead of tabs.
