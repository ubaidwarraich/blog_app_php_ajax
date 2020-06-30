  <?php include 'header.php';?>
    <div class="wrapper">   
        <div class="post">
        <div class="heading">
           <input type="text" class="input-heading"value="" placeholder="enter a heading" style="font-size:18px;">
        </div>
        <div class="body">
                <textarea class="text" rows="30" cols="110">enter text
                </textarea>
                <div class="image">
                    choose an image
                   <input type="file" id="choose-profile">
                </div>
        </div>
        <button type="submit" class="edit-btn edit-btn" name="edit" id="create">Save</button>
        </div>
    <script src="./create.js"></script>
</body>
</html>