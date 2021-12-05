#cat menu

SELECT c.id, c.EnglishName 
FROM tbl_FOOD a 
left outer join tbl_FOODCAT b on b.FoodID = a.id 
left outer join tbl_CAT c on b.CatID = c.id group by c.id order by c.Ordering;



#after click, get food, (pre-click first food)

SELECT a.EnglishName, c.EnglishName FROM tbl_FOOD a left outer join tbl_FOODCAT b on b.FoodID = a.id left outer join tbl_CAT c on b.CatID = c.id

<div data-role="tabs" id="tabs">
  <div data-role="navbar">
    <ul>
      <li><a href="#one" data-ajax="false">one</a></li>
      <li><a href="#two" data-ajax="false">two</a></li>
    </ul>
  </div>
  <div id="one" class="ui-body-d ui-content">
    <h1>First tab contents</h1>
  </div>
  <div id="two">
    <ul data-role="listview" data-inset="true">
        <li><a href="#">Acura</a></li>
        <li><a href="#">Audi</a></li>
        <li><a href="#">BMW</a></li>
        <li><a href="#">Cadillac</a></li>
        <li><a href="#">Ferrari</a></li>
    </ul>
  </div>
</div>