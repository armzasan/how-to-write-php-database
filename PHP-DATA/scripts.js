function confirmDelete(id) {
    if(confirm("Are you sure you want to delete this record?")) {
        window.location.href = `delete.php?id=${id}`;
    }
}
