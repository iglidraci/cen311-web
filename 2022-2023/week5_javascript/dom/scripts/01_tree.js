/**
 * DOM nodes contain a wealth of links to other nearby nodes
 * Every node has a 'parentNode' property
 * Every element node has a 'childNodes' property (array-like object holding its children)
 * 'firstChild', 'lastChild' properties (null if node has no children)
 * 'previousSibling' and 'nextSibling' point to adjacent nodes
 * 'children' property is like 'childNodes' but contains only element children, not other types
 */


'use strict';

console.log(document);

const talksAbout = (node, string) => {
    if (node.nodeType == Node.ELEMENT_NODE) { // check if it's an element node
        for(let child of node.childNodes) {
            if (talksAbout(child, string))
                return true;
        }
    } else if(node.nodeType == Node.TEXT_NODE) {
        // nodeValue property of a text node holds the string of text
        return node.nodeValue.toLowerCase().indexOf(string) !== -1;
    }
       return false;
}

console.log(talksAbout(document.body, "javascript"));
