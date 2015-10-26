# pat-reading-time
Textpattern CMS plugin

Display a words counter &amp; estimated reading time for articles.

This (very simple) Textpattern CMS plugin offers 2 tags to display a word counter and/or an estimated time reading for articles.

##Usages

###TXP tag

    <txp:pat_reading_time text="" title="" before="" charlist="" wraptag="" break="" class="" />

###Attributes

> `text` (string): set which content to apply for the result, among body or excerpt. Default: `body`.
> 
> `title` (string): set the text before the result. Default: "`Words: `".
> 
> `plural` (string): plural character for "word". Default: "`s`".
> `before` (boolean): position with the count for the content of the "title" attribute (among before: 1 or after: 0). Default: "`1`".
> `charlist` (string): list of additional characters - without any commas - to include into the count (e.g. "!\"'"). Default: `empty`.
> `wraptag` (letter): HTML container tag. Default: `p`.
> 
> `break` (string): HTML break tag. Default: `br`.
> 
> `class` (string): HTML class attribute. Default: "`word-count`".

###TXP tag

    <txp:pat_estimate_time_reading text="" title="" short="" minute="" second="" plural="" wraptag="" break="" class="" />
    
###Attributes

> `text` (string): set which content to apply for the result, among body or excerpt. Default: `body`.
> 
> `title` (string): set the text before the result. Default: "`Time to read: `".
> 
> `short` (boolean): display only minutes time. Default: "`0`" (display full estimation time with seconds).
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

###Changelog

    26th October 2015. v 0.2.1. Display nothing if text content is empty. Do not display "0 time".
    6th August 2014. v 0.2. Add "short" attribute in order to show only minutes time.
    12 May 2014. v 0.1. First release.

