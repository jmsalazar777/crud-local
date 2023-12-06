<?php
include("database_connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>CRUD EXAM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="add-btn row">
                    <div class="col-sm-12 mb-4">
                        <a href="#addBookModal" class="btn btn-success" data-toggle="modal"><span>Add</span></a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>ISBN</th>
                            <th>AUTHOR</th>
                            <th>PUBLISHER</th>
                            <th>YEAR PUBLISHED</th>
                            <th>CATEGORY</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="book_data">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addBookModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" id="isbn_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>AUTHOR</label>
                        <input type="text" id="author_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>PUBLISHER</label>
                        <input type="text" id="publisher_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>YEAR PUBLISHED</label>
                        <input type="text" id="year_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>CATEGORY</label>
                        <input type="text" id="category_input" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addBook()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editBookModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_book">
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" id="name_input" class="form-control">
                        <input type="hidden" id="book_id">
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" id="isbn_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>AUTHOR</label>
                        <input type="text" id="author_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PUBLISHER</label>
                        <input type="text" id="publisher_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>YEAR PUBLISHED</label>
                        <input type="text" id="year_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>CATEGORY</label>
                        <input type="text" id="category_input" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editBook()" value="Save">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewBookModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_book">
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" id="name_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" id="isbn_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>AUTHOR</label>
                        <input type="text" id="author_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>PUBLISHER</label>
                        <input type="text" id="publisher_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>YEAR PUBLISHED</label>
                        <input type="text" id="year_input" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>CATEGORY</label>
                        <input type="text" id="category_input" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteBookModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteBook()" value="Delete">
                </div>
            </div>
        </div>
    </div>
</body>

</html>