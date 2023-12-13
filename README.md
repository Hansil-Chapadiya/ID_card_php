
# ID-CARD GENERATOR
The ID Card Generator is a web application developed using PHP to provide an easy and efficient way to generate ID cards for the students for DR S & SS GANDHY COLLEGE.




## Features

- Easy Data Entry:
    Users can enter the necessary details such as name, ID number, department, and other relevant information through a simple and intuitive data entry form.

- Database Integration:
    The ID Card Generator website seamlessly integrates with a database to store and manage user information, ensuring efficient retrieval and updating of card data.
    
- Print and Download:
    Once the ID card design is finalized, users can choose to either print the card directly.


## Setup

- Clone the repository from: https://github.com/Hansil-Chapadiya/ID_card_php

- main.php :
```php
// Define login endpoint here
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/Hansil/Mini_Project/main.php/login') {
      //Change $_SERVER['REQUEST_URI'] to your URI.
  }
}

// Define upload endpoint here
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/Hansil/Mini_Project/main.php/upload') {
    //Change $_SERVER['REQUEST_URI'] to your URI.
    }
}
```

- In Related PHP files:

```php
//Configure the database connection 
```
- Modify path in files:

```php
require '/Mini_Project/excelReader/excel_reader2.php';
//Here, your related path
```



## Author

- [@HansilChapadiya](https://github.com/Hansil-Chapadiya)

