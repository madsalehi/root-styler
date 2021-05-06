# RootStyler v1.1.0
Tired of seeing ugly theme of localhost default page? <br/>
Try RootStyler! <br/>
RootStyler is a simple PHP script that changes the user interface of web server default page.<br/>
It uses Bootstrap and Vue.js for front-end.<br/>
It turns your localhost from this:

![old](https://user-images.githubusercontent.com/5165298/117302856-5422f480-ae91-11eb-9646-8d79be8c4191.png)

to this:

![new](https://user-images.githubusercontent.com/5165298/117303004-7ae12b00-ae91-11eb-8b25-2d2536ac8231.png)

Just copy the index.php and "root-styler" folder, into your webserver root folder.<br/>
for example if you are using XAMPP, you should copy the files and paste into C:\xampp\htdocs.<br/>
As you can see, RootStyler can show the files and folders separately.<br/>
Also you can search files and folders.


## Highlights
- Clean and colorful and glazed user interface design.
- Real-time search between files and folders.
- Display proper icons according to the file types. (Supported file types are existed in `assets/img` folder)
- Display last modified date much readable than traditional style.

## config.php file
If you look at "root-styler" folder, you see a config.php file, that includes some configurations:
- showScriptFolder:

if you want to hide the script folder (root-styler) you may use this option.

- showPageTitle:

if you want to hide the header of the page, you may set it to false.

- customBookmarks:

You may use this to add or remove custom bookmarks, such as your application serve location or just phpMyAdmin location.

## Development
Any contribution, pull requests, issue and feedbacks would be greatly appreciated.
- Fork the repository and clone it to your web server root folder
- Navigate to your local fork: `cd root-styler`
- Install the project dependencies: `npm install`
- Run the laravel mix for compiling source objects: `npx mix watch`

## License

MIT License
