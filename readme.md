# Split category description module for Oxid eShop v7

Split your category description by a ###more### token and
show description above and below the product list.

## Installation

    composer require ivoba-oxid/split-category-desc

## Usage
In "Erweiterungen -> Module -> Ivo Bathke: Split Category Desc" enter your settings in the "Settings" tab

In the long description field (Langtext) of the category enter a line with `###more###` to split the description.  
The text before `###more###` will be shown above the product list.  
The text after `###more###` will be shown below the product list.  
A *read more* button will be added at the upper text that will jump to the text below the list.

#### Why?  
For SEO and design purposes :)


#### Note:  
```oxcategories__oxlongdesc``` will be overwritten with the part before the token.  
Use ```$actCat->getLongDesc()``` for the full long description.

## Requirements
- UTF-8
- PHP >= 8
- Oxid eShop >= CE 7

## License MIT

© [Ivo Bathke](https://oxid.ivo-bathke.name)
