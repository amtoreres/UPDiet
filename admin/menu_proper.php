<?php
    include("../conn/connect.php");

    error_reporting(0);
    session_start();

    $uid = $_SESSION["admin"]["u_id"];

    $q = "SELECT * FROM store_menu WHERE u_id=$uid;";
    $res = $db->query($q);
    $rows = mysqli_fetch_array($res);
?>
<link rel="stylesheet" href="../css/a_menu_proper.css" />
<div class="menu-content">
    <div class="menu-control">
        <div class="menu-search">
            <input type="text" id="search-input" placeholder="Search items">
            <button type="button" id="search-trigger" class="icon-button control-button">
                <img src="../img/search.png">
            </button>
        </div>
        <div class="menu-filter">
            <span>Filter:</span>
            <select id="filter-control" class="control-select">
                <option value="All">All</option>
                <option value="Main Course">Main Course</option>
                <option value="Appetizer">Appetizer</option>
                <option value="Dessert">Dessert</option>
                <option value="Beverage">Beverage</option>
                <option value="Add-on">Add-on</option>
            </select>
        </div>
        <div class="menu-sort">
            <span>Sort By:</span>
            <select id="sort-control" class="control-select">
                <option value="0">Date Added</option>
                <option value="1">Name</option>
                <option value="2">Category</option>
            </select>
            <button type="button" id="sort-trigger" class="icon-button control-button">
                <img src="../img/sort-descending.png">
            </button>
        </div>
        <div class="icon-label-button">
            <button type="button" id="add-trigger">
                <img src="../img/add.png">
                <span>Add Item</span>
            </button>
        </div>
    </div>
    <div class="menu-list">
    </div>
</div>