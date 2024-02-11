# pat-reading-time
Textpattern CMS plugin

Display a words counter &amp; estimated reading time for articles.

This (very simple) Textpattern CMS plugin offers 2 tags to display a word counter and/or an estimated time reading for articles.

## Usages

### TXP tag

    <txp:pat_reading_time text="" title="" plural="" before="" wraptag="" break="" class="" />

### Attributes

> `text` (string): set which content to apply for the result, among body or excerpt. Default: `body`.
> 
> `title` (string): set the text before the result. Default: "`Words: `".
> 
> `plural` (string): plural character for "word". Default: "`s`".
>
> `before` (boolean): position with the count for the content of the "title" attribute (among before: 1 or after: 0). Default: "`1`".
>
> `wraptag` (letter): HTML container tag. Default: `p`.
> 
> `break` (string): HTML break tag. Default: `br`.
> 
> `class` (string): HTML class attribute. Default: "`word-count`".

### TXP tag

    <txp:pat_estimate_time_reading text="" title="" short="" before="" minute="" second="" plural="" wraptag="" break="" class="" size="" color="" frequence="" />
    
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
> `color` (string): the color to apply for the SVG clock icon. Default: `#5d5d5d`.
>
> `size` (integer): the size for the SVG clock icon. Default: `18`.
> 
> `frequence` (integer): the number of words read by minutes (average). Default: `200`.

### Changelog

> February 8, 2024. v 0.2.3. Adding attributes. Cosmetic changes.

> August 26, 2019. v 0.2.2. Add an SVG icon with fallback.

> October 26, 2015. v 0.2.1. Display nothing if text content is empty. Do not display "0 minute".
> 
> August 6, 2014. v 0.2. Add "short" attribute in order to show only minutes time.
> 
> May 12, 2014. v 0.1. First release.

