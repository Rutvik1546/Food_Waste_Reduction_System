<?php
// common/search.php
if (!isset($_SESSION)) {
    session_start();
}
?>

<form method="GET" action="index.php" style="text-align:center; margin:20px auto;">
    <!-- Hidden controller and action values -->
    <input type="hidden" name="controller" value="item">
    <input type="hidden" name="action" value="displayDonate">

    <!-- Search bar -->
    <input 
        type="text" 
        name="search" 
        placeholder="Search by item name..." 
        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" 
        style="padding:8px; width:250px; border:1px solid #ccc; border-radius:4px;"
    >

    <button 
        type="submit" 
        style="padding:8px 15px; border:none; background-color:#28a745; color:white; border-radius:4px; cursor:pointer;"
    >
        🔍 Search
    </button>

    <?php if (!empty($_GET['search'])) { ?>
        <a href="index.php?controller=item&action=displayDonate" 
           style="margin-left:10px; color:red; text-decoration:none;">
           ✖ Clear
        </a>
    <?php } ?>
</form>
