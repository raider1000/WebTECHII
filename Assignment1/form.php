<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Assignment1</title>
</head>

<body>
    <h1>Registration Form</h1>
    <p>Use tab keys to move from one input field to the next.</p>

    <form method="POST" action="validation.php">
        <label for="userid">User ID: <span style="color: red;"> * </span></label>
        <input type="text" id="userid" name="userid" required><br><br>

        <label for="password">Password: <span style="color: red;"> * </span></label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="fname">First Name:<span style="color: red;"> * </span></label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>

        <label for="country">Country: <span style="color: red;"> * </span></label>
        <select id="country" name="country">
            <option value="Nepal">Nepal</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
        </select><br><br>

        <label for="zip">ZIP Code: <span style="color: red;"> * </span></label>
        <input type="text" id="zip" name="zip"><br><br>

        <label for="email">Email: <span style="color: red;"> * </span></label>
        <input type="email" id="email" name="email"><br><br>

        <label>Sex: <span style="color: red;"> * </span></label>
        <input type="radio" name="gender" value="Male" id="male"><label for="male">Male</label>
        <input type="radio" name="gender" value="Female" id="female"><label for="female">Female</label><br><br>

        <label>Language: <span style="color: red;"> * </span></label>
        <input type="checkbox" name="language[]" value="English">English
        <input type="checkbox" name="language[]" value="Non English">Non English<br><br>

        <label for="about">About:</label><br>
        <textarea name="about" id="about" rows="4" cols="40"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>