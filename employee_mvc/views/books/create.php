<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <style>
        form {
            width: 50%;
            margin: 20px auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST" action="index.php?action=create">
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <div class="form-group">
            <label>Author:</label>
            <input type="text" name="author" required>
        </div>
        <div class="form-group">
            <label>Published Year:</label>
            <input type="number" name="published_year" required>
        </div>
        <button type="submit">Save Book</button>
    </form>
</body>
</html>
