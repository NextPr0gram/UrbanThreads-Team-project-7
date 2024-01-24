<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2</title>
</head>
<body>

<h1>Category Information</h1>

<ul>
    <li><strong>Name:</strong> <?php echo $category->name; ?></li>
    <li><strong>Slug:</strong> <?php echo $category->slug; ?></li>
    <li><strong>Description:</strong> <?php echo $category->description; ?></li>
    <li><strong>Status:</strong> <?php echo $category->status == 1 ? 'Active' : 'Inactive'; ?></li>
    <li><strong>Popular:</strong> <?php echo $category->popular == 1 ? 'Yes' : 'No'; ?></li>
    <li><strong>Meta Title:</strong> <?php echo $category->meta_title; ?></li>
    <li><strong>Meta Keywords:</strong> <?php echo $category->meta_keywords; ?></li>
    <li><strong>Meta Description:</strong> <?php echo $category->meta_description; ?></li>
</ul>

<a href="/dashboard">Back to Dashboard</a>

</body>
</html>
