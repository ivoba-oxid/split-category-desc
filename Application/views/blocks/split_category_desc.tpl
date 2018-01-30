[{$smarty.block.parent}]

[{if $actCategory->oxcategories__oxlongdesc->value && $actCategory->hasMoreDesc()}]
    <div id="moreCatDesc" class="category-more-description">
        [{$actCategory->getMoreDesc()}]
    </div>
[{/if}]