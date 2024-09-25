<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>WEBDEV-GUANZON</title>
    <style>
    </style>
</head>
<body>
    <section>
    <?php
                                require_once "clean.php";
                                require_once "class/books.class.php";
                                
                                $bt = $an = $ge = $pu = $pd = $ed = $nc = $fo = $ag = $br = "";
                                $allFieldsInputed = true;

                                    $objBook = new Books;
                                    $tableDatas = $objBook->getData();
                                    


                                if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['submit'])){
                                    if(empty($_POST['bookTitle'])){
                                        $bt = "*Book Title is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $bookTitle = clean($_POST['bookTitle']);
                                    }

                                    if(empty($_POST['authorsName'])){
                                        $an = "*Author's Name is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $authorsName = clean($_POST['authorsName']);
                                    }   

                                    if(empty($_POST['genre'])){
                                        $ge = "*Genre is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $genre = clean($_POST['genre']);
                                    }
                                    if(empty($_POST['publisher'])){
                                        $pu = "*Publisher is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $publisher = clean($_POST['publisher']);
                                    }

                                    if(empty($_POST['pubdate'])){
                                        $pd = "*Publication Date is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $pubdate = clean($_POST['pubdate']);
                                    }

                                    if(empty($_POST['edition'])){
                                        $ed = "*Edition is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $edition = clean($_POST['edition']);
                                    }

                                    if(empty($_POST['copies'])){
                                        $nc = "*Number of copies is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $copies = clean($_POST['copies']);
                                    }

                                    if(empty($_POST['format'])){
                                        $ag = "*Age Group is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $format = clean($_POST['format']);
                                    }

                                    if(empty($_POST['age'])){
                                        $ag = "*Age Group is required!";
                                        $allFieldsInputed = false;
                                    }else{
                                        $age = clean($_POST['age']);
                                    }

                                    if(empty($_POST['description'])){
                                        $ag = "*Description is recommended";
                                        $allFieldsInputed = false;
                                    }else{
                                        $description = clean($_POST['description']);
                                    }

                                    
                                    if ($allFieldsInputed){
                                    $objBook->setData($bookTitle, $authorsName, $genre, $publisher, $pubdate, $edition, $copies, $format, $age, $description);
                                    $tableDatas = $objBook->getData();
                                    header('location: ' . $_SERVER['PHP_SELF']);
                                    exit;
                                }
                                }
                                
                                
                                
                    ?>


        <div class="p-container">
            <div class="container">
                <form action="" method="post">
                    <div>
                        <select name="haha" id="haha">
                            <option value="">--Select</option>
                            <option value="bookT">Book Title</option>
                            <option value="AuName">Author's Name</option>
                        </select>
                        <label for="key">Keyword</label>
                        <input type="text" name= "keyword" id= "keyword">
                        <input type="submit" value= "submit" id="submit"> 

                    </div>
                    <div class="align">
                        <label for="bookTitle">Book Title <span style="color: red;"><?php echo $bt?></span></label>
                            <div class="input">
                                <input type="text" name="bookTitle" id="bookTitle" placeholder="Enter Book Title">
                            </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="authorsName">Author's Name <span style="color: red"><?php echo $an?></span></label>
                            <div class="input">
                                <input type="text" name="authorsName" id="authorsName" placeholder="Enter Lead Autho's Name">
                            </div>
                    </div>
                    <br>
                    <div class="align">
                    <label for="genre" id="genre">Genre <span style="color: red"><?php echo $ge?></span></label>
                        <div class="input">
                            <select name="genre" id="genre">
                                <option value="" selected disabled>Select Genre</option>
                                <option value="fiction">Fiction</option>
                                <option value="scifi">SciFi</option>
                                <option value="mystery">Mystery</option>
                                <option value="horror">Horror</option>
                                <option value="romance">Romance</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="publisher">Publisher <span style="color: red"><?php echo $pu?></span></label>
                            <div class="input">
                                <input type="text" name="publisher" id="publisher" placeholder="Enter Publisher's Name">
                            </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="pubdate">Publication Date <span style="color: red"><?php echo $pd?></span></label>
                            <div class="input">
                                <input type="date" name="pubdate" id="pubdate" value="pubdate">
                            </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="edition">Edition <span style="color: red"><?php echo $ed?></span></label>
                            <div class="input">
                                <input type="number" name="edition" id="edition" placeholder="Enter Edition Number">
                            </div>
                    </div>
                    <br>
                    <div class="align">
                    <label for="copies">Number of Copies <span style="color: red"><?php echo $nc?></span></label>
                        <div class="input">
                            <input type="number" name="copies" id="copies" placeholder="Enter number of available">
                        </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="format">Format <span style="color: red"><?php echo $fo?></span></label>
                            <div class="input">
                                <input type="radio" name="format" id="hardbound" value="hardbound">
                                <label for="hardbound">Hardbound</label>
                                <input type="radio" name="format" id="softbound" value="softbound">
                                <label for="softbound">Softbound</label>
                            </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="age">Age Group <span style="color: red"><?php echo $ag?></span></label>
                            <div class="inpu    t">
                                <div class="flex">
                                    <input type="checkbox" name="age" id="kids" value="kids">
                                    <label for="kids">Kids</label>
                                    <input type="checkbox" name="age" id="teens" value="teens">
                                    <label for="teens">Teens</label>
                                    <input type="checkbox" name="age" id="adult" value="adult">
                                    <label for="adult">Adult</label>
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="align">
                        <label for="rating">Book Rating <span style="color: red"><?php echo $br?></span></label>
                            <div class="input">
                                <div class="smiley-rating">
                                <span class="smiley" name="emoji" value="one" onclick="selectRating(1)"><i class="fa-solid fa-face-frown" style="color: #ea3953;"></i></span>
                                <span class="smiley" name="emoji" value="two" onclick="selectRating(2)"><i class="fa-solid fa-face-frown-open" style="color: #fd7e1d;"></i></span>
                                <span class="smiley" name="emoji" value="three" onclick="selectRating(3)"><i class="fa-solid fa-face-meh" style="color: #fecf2b;"></i></span>
                                <span class="smiley" name="emoji" value="four" onclick="selectRating(4)"> <i class="fa-solid fa-face-smile" style="color:#adda18; "></i></span>
                                <span class="smiley" name="emoji" value="five" onclick="selectRating(5)"><i class="fa-solid fa-face-smile-beam" style="color: #4ecd57;"></i></span>
                            </div>
                            </div>
                    </div>
                    <br>
                    <label for="description" class="desc">Description </label>
                        <div class="input">
                            <textarea class="move" cols="33" rows="2"name="description" id="description"></textarea>
                        </div>
                        <br>
                        <input type="submit" name="submit" value="Submit" >
                    </div>

                    
                    <div class="tables">
                        <table>
                            <tr class="header">
                                <th>Book Title</th>
                                <th>Author's Name</th>
                                <th>Genre</th>
                                <th>Publisher</th>
                                <th>Publication Date</th>
                                <th>Edition</th>
                                <th>Number of Copies</th>
                                <th>Format</th>
                                <th>Age Group</th>
                                <!-- <th>Book Rating</th> -->
                                <th>Description</th>
                                <th>edit</th>
                            </tr>
                                <?php foreach($tableDatas as $datas): extract($datas);?>
                                    <tr class="data">
                                        <td><?php echo $bookTitle ?></td>
                                        <td><?php echo $authorsName ?></td>
                                        <td><?php echo $genre ?></td>
                                        <td><?php echo $publisher ?></td>
                                        <td><?php echo $pubdate ?></td>
                                        <td><?php echo $edition ?></td>
                                        <td><?php echo $copies ?></td>
                                        <td><?php echo $format ?></td>
                                        <td><?php echo $age ?></td>
                                        <td><?php echo $description ?></td>
                                        <td>
                                            <a href="edit.php?:">Edit</a>
                                            <a href="delete.php">Delete</a>
                                        </td>
                                    </tr>   
                                <?php endforeach?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/66216b0ead.js" crossorigin="anonymous"></script>
    <script>
        function selectRating(rating) {
            const smileys = document.querySelectorAll('.smiley');
            smileys.forEach((smiley, index) => {
                if (index < rating) {
                    smiley.classList.add('selected');
                } else {
                    smiley.classList.remove('selected');
                }
            });
        }
    </script>
</body>
</html>
