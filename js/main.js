$(document).ready(function () {
  bookList();
});

function bookList() {
  $.ajax({
    type: "get",
    url: "book-list.php",
    success: function (data) {
      console.log(data);
      var response = JSON.parse(data);
      console.log(response);
      var tr = "";
      for (var i = 0; i < response.length; i++) {
        var id = response[i].id;
        var title = response[i].title;
        var isbn = response[i].isbn;
        var author = response[i].author;
        var publisher = response[i].publisher;
        var yearPublished = response[i].year_published;
        var category = response[i].category;
        tr += "<tr>";
        tr += "<td>" + title + "</td>";
        tr += "<td>" + isbn + "</td>";
        tr += "<td>" + author + "</td>";
        tr += "<td>" + publisher + "</td>";
        tr += "<td>" + yearPublished + "</td>";
        tr += "<td>" + category + "</td>";
        tr += '<td><div class="d-flex">';

        tr +=
          '<a href="#editBookModal" class="m-1 btn btn-secondary" data-toggle="modal" onclick=viewBook("' +
          id +
          '")>EDIT</a>';
        tr +=
          '<a href="#deleteBookModal" class="m-1 btn btn-secondary" data-toggle="modal" onclick=$("#delete_id").val("' +
          id +
          '")>DEL</a>';
        tr += "</div></td>";
        tr += "</tr>";
      }
      $(".loading").hide();
      $("#book_data").html(tr);
    },
  });
}

function addBook() {
  var title = $("#addBookModal #name_input").val();
  var isbn = $("#addBookModal #isbn_input").val();
  var author = $("#addBookModal #author_input").val();
  var publisher = $("#addBookModal #publisher_input").val();
  var yearPublished = $("#addBookModal #year_input").val();
  var category = $("#addBookModal #category_input").val();

  $.ajax({
    type: "post",
    data: {
      title: title,
      isbn: isbn,
      author: author,
      publisher: publisher,
      yearPublished: yearPublished,
      category: category,
    },
    url: "add.php",
    success: function (data) {
      var response = JSON.parse(data);
      $("#addBookModal").modal("hide");
      bookList();
      alert(response.message);
    },
  });
}

function editBook() {
  var title = $(".edit_book #name_input").val();
  var isbn = $(".edit_book #isbn_input").val();
  var author = $(".edit_book #author_input").val();
  var publisher = $(".edit_book #publisher_input").val();
  var yearPublished = $(".edit_book #year_input").val();
  var category = $(".edit_book #category_input").val();
  var book_id = $(".edit_book #book_id").val();

  $.ajax({
    type: "post",
    data: {
      title: title,
      isbn: isbn,
      author: author,
      publisher: publisher,
      yearPublished: yearPublished,
      category: category,
      id: book_id,
    },
    url: "edit.php",
    success: function (data) {
      var response = JSON.parse(data);
      $("#editBookModal").modal("hide");
      bookList();
      alert(response.message);
    },
  });
}

function viewBook(id = 2) {
  $.ajax({
    type: "get",
    data: {
      id: id,
    },
    url: "view.php",
    success: function (data) {
      var response = JSON.parse(data);
      $(".edit_book #name_input").val(response.title);
      $(".edit_book #isbn_input").val(response.isbn);
      $(".edit_book #author_input").val(response.author);
      $(".edit_book #publisher_input").val(response.publisher);
      $(".edit_book #yearPublished_input").val(response.year_published);
      $(".edit_book #category_input").val(response.category);
      $(".edit_book #book_id").val(response.id);
      $(".view_book #title_input").val(response.title);
      $(".view_book #isbn_input").val(response.isbn);
      $(".view_book #author_input").val(response.author);
      $(".view_book #publisher_input").val(response.publisher);
      $(".edit_book #year_input").val(response.year_published);
      $(".view_book #category_input").val(response.category);
    },
  });
}

function deleteBook() {
  var id = $("#delete_id").val();
  $("#deleteBookModal").modal("hide");
  $.ajax({
    type: "get",
    data: {
      id: id,
    },
    url: "delete.php",
    success: function (data) {
      var response = JSON.parse(data);
      bookList();
      alert(response.message);
    },
  });
}
