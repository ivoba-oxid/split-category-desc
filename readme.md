# Split category description module for Oxid eShop v6

Split your category description by a ###more### token and 
show description above and below the product list.

## Installation

    composer require ivoba-oxid/split-category-desc

## Usage
In "Erweiterungen -> Module -> Ivo Bathke: Split Category Desc" enter your settings in the "Settings" tab

In your log description field enter a line with ###more### to split the description.

Note:  
```oxcategories__oxlongdesc``` will be overwritten with the part before the token.  
Use ```$actCat->getLongDesc()``` for the full long description.

## Requirements
- UTF-8
- PHP >= 7
- Oxid eShop >= CE 6

## License MIT

© [Ivo Bathke](https://oxid.ivo-bathke.name)