# Animate.scss 
*Just-add-water CSS animation by Dan Eden, Sassified.*

`animate.css` is a bunch of cool, fun, and cross-browser animations for you to use in your projects. Great for emphasis, home pages, sliders, and general just-add-water-awesomeness. This is a basic SCSS port so that you can have all animations available in a project, without increasing the size of the final compiled CSS with code you're not using. 

[Check out all the animations here!](https://daneden.github.io/animate.css/)

## Usage
Because this version uses mixins, not classes, adding classes to your HTML won't work. To add an animation, you must call all the relevant mixins.

1. Load the animation definition - `@include keyframes-animationName` (see note below)
2. Call the animation - `@include animationName `
3. Set it to infinite (optional) - `@include animate-infinite`

Example: 

``` 
p { 	
	@include keyframes-bounce;
	@include bounce;
	@include animate-infinite; 
} 
```

**Note**: You can load the animation definition either inside your CSS declaration or outside it. The reason I have kept these mixins separate and not included them in the animation call (step 2 above) is because they are quite a lot of lines of code, so if you are using the same animation on many different elements you may want to load the definition outside those declarations so you only load it once rather than repeating it (thus avoiding unnecessary duplicate code in your compiled CSS).

## License
Animate.css is licensed under the MIT license. (http://opensource.org/licenses/MIT).