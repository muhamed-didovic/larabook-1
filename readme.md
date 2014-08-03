## Larabook

Working along with Jeffrey Way's awesome course on laracasts.com

This version is bound to become very much modified from the original source because I just can't help myself. I have to mess around with things :-)

#BIG CHANGES!!
Anyone using this to follow along, none of the lesson code has changed except for the routes file which is now cleaned up, organized, and using namespaces for the controllers. A lot of things moved into the Larabook namespace today because I decided to start working on an api next to the application.

Controllers, routes, and filters moved, a service provider was added, and all the new stuff in the api/v1 directory which is just a starting point. Notice in config/app and config/local/app how the api service provider is commented out. You really don't want to run both an app and a api from the same laravel app because of security and the potential for things to conflict such as an auth filter for the app and an auth filter for the api. Already found that out the hard way. If both service providers are loaded the application tries to use the auth filter defined for the api.

Went ahead and moved views into the larabook dir because they belong there since I also have an api namespace and a json api does not make use of views.

### Up to date with following users lesson

Yep after all the changes you can still rely on Borats' two thumbs up. Thoroughly tested and all is well.
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
