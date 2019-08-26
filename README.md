# pat-reading-time
Textpattern CMS plugin

Display a words counter &amp; estimated reading time for articles.

This (very simple) Textpattern CMS plugin offers 2 tags to display a word counter and/or an estimated time reading for articles.

## Usages

### TXP tag

    <txp:pat_reading_time text="" title="" before="" charlist="" wraptag="" break="" class="" />

### Attributes

> `text` (string): set which content to apply for the result, among body or excerpt. Default: `body`.
> 
> `title` (string): set the text before the result. Default: "`Words: `".
> 
> `plural` (string): plural character for "word". Default: "`s`".
>
> `before` (boolean): position with the count for the content of the "title" attribute (among before: 1 or after: 0). Default: "`1`".
>
> `charlist` (string): list of additional characters - without any commas - to include into the count (e.g. "!\"'"). Default: `empty`.
>
> `wraptag` (letter): HTML container tag. Default: `p`.
> 
> `break` (string): HTML break tag. Default: `br`.
> 
> `class` (string): HTML class attribute. Default: "`word-count`".

### TXP tag

    <txp:pat_estimate_time_reading text="" title="" short="" before="" minute="" second="" plural="" wraptag="" break="" class="" />
    
### Attributes

> `text` (string): set which content to apply for the result, among body or excerpt. Default: `body`.
> 
> `title` (string): set the text before the result. Default: "`Time to read: `".
> 
> `short` (boolean): display only minutes time. Default: "`0`" (display full estimation time with seconds).
>
> `before` (boolean): the position of the `text` content before or after the result.
>
> `wraptag` (string): HTML container tag. Default: `p`.
> 
> `break` (string): HTML breaking tag. Default: `br`.
> 
> `minute` (integer): word for the "minute" time (i18n support). Default: "`minute`".
> 
> `second` (integer): word for the "second" time (i18n support). Default: "`second`".
> 
> `plural` (string): plural character for "minute" & "second". Default: "`s`".
> 
> `class` (string): HTML class attribute. Default: "time-reading".
> 
> `frequence` (integer): the number of words read by minutes (average). Default: `200`.

Sample results :

Within recent browsers: <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIzIiBzdHJva2UtbGluZWNhcD0ic3F1YXJlIiBzdHJva2UtbGluZWpvaW49ImFyY3MiPjxjaXJjbGUgY3g9IjEyIiBjeT0iMTIiIHI9IjEwIj48L2NpcmNsZT48cG9seWxpbmUgcG9pbnRzPSIxMiA2IDEyIDEyIDE2IDE0Ij48L3BvbHlsaW5lPjwvc3ZnPg==" width="20" height="20" alt="" /> 1 minute 35 seconds read.

Within older browsers: ⟳ 1 minute 35 seconds read.

### Changelog

> 26th August 2019. v 0.2.2. Add an SVG icon with fallback.

> 26th October 2015. v 0.2.1. Display nothing if text content is empty. Do not display "0 minute".
> 
> 6th August 2014. v 0.2. Add "short" attribute in order to show only minutes time.
> 
> 12 May 2014. v 0.1. First release.

