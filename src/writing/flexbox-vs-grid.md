---
title: Flexbox vs. Grid
description: Taking some time to actually learn Flexbox and Grid.
date: 2019-12-20
tags: html, css
layout: post.njk
---
Flexbox and CSS Grid have come out with much more impressive browser support over the last year or so which allows them to be effectively used in most production cases. 

I have a feeling that as the support increases, learning to use the two and, more importantly, *when to use either of them* will be vital to working with the Front End.

## What *I think* I know
**Flexbox** is simply more flexible (duh). It allows you to set columns and rows which fills the space rather than setting a specific grid. It's set by setting the `display` property to `display: flex`. The last time I checked, Flexbox has more browser support but I think the gap is closing.

**CSS Grid** sets more rigid grids as far as I know, it's simpler from my experience and is an obvious upgrade over the float methods that I learned in school.

I've briefly used both but only have a superficial understanding and would like to expand on that.

## Flexbox
I was mostly right–Flexbox's main purpose is to **expand and contract items to fill free space**. Apparently, it is also better suited for components rather than large layouts – more on this later.

### Key Terminology
- Main Axis
- Main Start and End
- Main Size
- Cross Axis
- Cross Start and End
- Cross Size

Most of the work is done on the parent element, so we will start there. Let's be simple and just call it `.flex__container`.

Setting the display property to `display: flex;` does just that. Easy enough.

I'm not sure about the use of inline-flex, but I'll look into it.

```css
.flex__container {
    display: flex | inline-flex; 
    /* sets the flex__container to a flexible container */
}
```
Flex Direction uses the native reading axis of your browser so if you have a native language that isn't left-to-right like English, it will reverse; `row` establishes items horizontally, and `column` establishes items vertically.

```css
.flex__container {
    ...
    flex-direction: row | row-reverse | column | column-reverse;
    /* establishes direction that items are placed in the flex__container */
    ...
 }
```   
Flex Wrap will either wrap the flex items, or leave them on one line. 
```css
.flex__container {
    ...
    flex-wrap: no-wrap | wrap | wrap-reverse;
    /* tells items to fit on one line or wrap accordingly */
    ...
}
```
A pretty handy shorthand to combine the two above is `flex-flow`.
```css
.flex__container {
    ...
    flex-flow: <flex-direction> | <flex-wrap>;
    /* shorthand for both properties */
    ...    
}
```
`justify-content` helps you distribute the items along the main axis (set by `flex-direction`) in your flex__container. Browser support is tricky apparently though:

> Note that that browser support for these values is nuanced. For example, `space-between` never got support from some versions of Edge, and start/end/left/right aren't in Chrome yet. MDN [has detailed charts](https://developer.mozilla.org/en-US/docs/Web/CSS/justify-content). The safest values are `flex-start`, `flex-end`, and `center`.
>
> [- CSS Tricks](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
```css
.flex__container {
    ...
    justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly | start | end | left | right;
    /* defines item alignment along the main axis of the flex__container */
    ...
}
```
`Align-items` is basically the same thing as `justify-content`, just for the opposite axis (perpendicular to `flex-direction`).
```css
.flex__container {
    ...
    align-items: stretch | flex-start | flex-end | center | baseline | first baseline | last baseline | start | end | self-start | self-end;
    ...
}
```
`align-content` sets the **entire** container's lines similar to how `justify-content` does to an individual line.
```css
.flex__container {
    ...
    align-content: flex-start | flex-end | center | space-between | space-around | space-evenly | stretch | start | end | baseline | first baseline | last baseline;
    ...
}
```
Now let's take a look at the child elements, we'll call them a `flex__item`.

```css
.flex__item {
    order: [integer];
    /* determines the order along flex__container's main axis; default is 0 */
}
```
With `flex-grow` you can change the proportion of the space that an item takes up in relation to the other items.

This is simpler than it seems when you write it out. If you have `flex__item` set to the default of 1 then setting `flex__item--double` to 2 will double the space that those children will take up in the parent container.
```css
.flex__item {
    ...
    flex-grow: [number];
    /* sets the size of the item to fill the space by proportion in relation to the other items */
    ...
}
```
`flex-shrink` sets the space proportion similar to how `flex-grow` does–just in reverse.
```css
.flex__item {
    ...
    flex-shrink: [number];
    /* like grow, but the opposite. */
    ...
}
```
I am pretty sure that `flex-basis` acts as a sort of padding if it is set to the default value of `auto`, it does this by setting the *basis* by which the item flexes from the **whole item** to just the **space around the content inside**. `0` changes that to the **whole item**.
```css
.flex__item {
    ...
    flex-basis: [length] | auto;
    /* defines an element's size before remaining space is distributed */
    ...
}
```
`flex` is the general shorthand for all of the above properties. Default value is `0 1 auto`. **CSS tricks recommends using this** because it sets the other values "intelligently." I'll generally do that because they seem to know what they're doing.

```css
.flex__item {
    flex: none | [ <'flex-grow'> <'flex-shrink'>? || <'flex-basis'>
    /* another handy shorthand */
}
```
`align-self` sets an override for align-items.

Set this on an item by item basis.

```css
.flex__item {
    align-self: auto | flex-start | flex-end | center | baseline | stretch;
    /* allows an individual item to overide what is set by align-items */
}
```
----

### Simple Flex Usage
So if we take this HTML:

```html
<div class="flex__container">
    <div class="flex__item">Item 1</div>
    <div class="flex__item">Item 2</div>
    <div class="flex__item">Item 3</div>
    <div class="flex__item">Item 4</div>
    <div class="flex__item">Item 5</div>
    <div class="flex__item">Item 6</div>
</div>
```

With this CSS:

```css
.flex__container {
    height: 200px;
}
.flex__item {
    height: 100px;
    margin: auto;
    width: 100px;
}
```

It starts off like this:
[https://codepen.io/ethanshutt/pen/xxbxRQg](https://codepen.io/ethanshutt/pen/xxbxRQg)

By adding more flexbox properties to just the container makes it look better a lot faster.

```css
.flex__container {
    height: 200px;

    /* flexbox properties */
    display: flex;
    flew-direction: row;
    flex-wrap: wrap;
    justify-content: center;
}
```
[https://codepen.io/ethanshutt/pen/VwYwmOy](https://codepen.io/ethanshutt/pen/VwYwmOy)

### A couple realistic examples
#### A Card Element
You can build a card element without using Flexbox, it was done for a long time.

However with Flexbox, building a layout using cards is incredibly simple. 

We'll start with a laying out a single card and then adding more to show how powerful it can get.

```html
<div class="card">
    <img src="https://www.fillmurray.com/300/200" alt="Fill Murray" class="card__img">
    <h1 class="card__title">Bill Murray</h1>
    <p class="card__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi numquam sequi hic odit debitis sed exercitationem id, sit sapiente nam!</p>
    <button class="card__button">Click Me</button>
</div>
```

Adding `display: flex;` to the card element and setting it to be a column will insure that the content will span the width of the card.

```css
.card {
    display: flex;
    flex-direction: column;
    width: 250px; /* this will change later */
}
```

Then we can add multiple cards under a container named `cards`. Setting this to a flex container will automatically distribute the cards throughout the layout.

```html

<div class="cards">
    <div class="card">
        <img src="https://www.fillmurray.com/300/200" alt="Fill Murray" class="card__img">
        <h1 class="card__title">Bill Murray</h1>
        <p class="card__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi numquam sequi hic odit debitis sed exercitationem id, sit sapiente nam!</p>
        <button class="card__button">Click Me</button>
    </div>
    <div class="card">
        <img src="https://www.fillmurray.com/300/200" alt="Fill Murray" class="card__img">
        <h1 class="card__title">Bill Murray</h1>
        <p class="card__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi numquam sequi hic odit debitis sed exercitationem id, sit sapiente nam!</p>
        <button class="card__button">Click Me</button>
    </div>
    <div class="card">
        <img src="https://www.fillmurray.com/300/200" alt="Fill Murray" class="card__img">
        <h1 class="card__title">Bill Murray</h1>
        <p class="card__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi numquam sequi hic odit debitis sed exercitationem id, sit sapiente nam!</p>
        <button class="card__button">Click Me</button>
    </div>
    ...
</div>
```

Then we wrap it up by making `card__img` responsive and voilà, you have a card layout.

```css
.cards {
    align-items: center;
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
}

.card {
    border: 2px solid #ccc;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    margin: 10px;
    max-width: 400px;
    padding: 10px;
}
.card__img {
    width: 100%;
}
```

----

## CSS Grid
I have slightly more experience with Grid. I completed Wes Bos's [CSS Grid Course](https://cssgrid.io/) about a year ago, but it was over the course of a weekend and my knowledge is very elementary.

We'll start with a container I'll call `grid__container`.

Key Terminology:

- **Grid**
- **Item**
- **Line**
- **Grid Track**
- **Cell**
- **Area**

```css
.grid__container {
    display: grid | inline-grid; 
    /* sets the container to a grid */
}
```
