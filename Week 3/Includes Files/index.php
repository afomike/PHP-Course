<?php

// Includes in PHP are used to include the contents of one PHP file into another PHP file. This allows you to reuse code and organize your application into smaller, more manageable files. There are two types of includes in PHP: include and require. The include statement will include the specified file and continue executing the script even if the file is not found, while the require statement will include the specified file and stop executing the script if the file is not found.
// require /require_once / include / include_once
require 'header.php'; // This will include the header.php file and stop executing the script if the file is not found.

echo "This is the main content of the page.\n";

include 'footer.php'; // This will include the footer.php file and continue executing the script even if the file is not found.1

require_once 'header.php'; // This will not include the header.php file again, as it has already been included once.

// usecase: You can use includes to separate your code into different files, such as a header file, a footer file, and a main content file. This allows you to reuse the header and footer files across multiple pages of your application, while keeping the main content separate for each page.