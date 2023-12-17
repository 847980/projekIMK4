<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Dropdown</title>
  <style>
    /* Style for the dropdown container */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Style for the button (visible part of the dropdown) */
    .dropdown button {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      background-color: #fff;
      cursor: pointer;
    }

    /* Style for the dropdown content (the options) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Style for each option in the dropdown */
    .dropdown-content a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
    }

    /* Hover effect for options */
    .dropdown-content a:hover {
      background-color: #ddd;
    }

    /* Show the dropdown content when the button is hovered over */
    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>
<body>

<div class="dropdown">
  <button>Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Option 1</a>
    <a href="#">Option 2</a>
    <a href="#">Option 3</a>
  </div>
</div>

</body>
</html>
