function deleteData(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success btn-sm",
          cancelButton: "btn btn-danger btn-sm"
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({

        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
    }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        }
    })
}
