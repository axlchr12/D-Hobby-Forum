var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

let invalidFeedback = document.querySelectorAll('.invalid-feedback');
invalidFeedback.forEach(element => {
    if (document.getElementById('startDiscussion')) {
      var myModal = new bootstrap.Modal(document.getElementById("startDiscussion"), {});
    } else {
      var myModal = new bootstrap.Modal(document.getElementById("replyDiscussion"), {});
    }
    if (element.childNodes.length == 0) {
      console.log('ok aman');
    } else {
      console.log('ok ada');
      myModal.show();
    }
  });


// form
let elmSelect = document.getElementById('sort');

if (!!elmSelect) {
    elmSelect.addEventListener('change', e => {
        let choice = e.target.value;
        if (!choice) return;

        let url = new URL(window.location.href);
        url.searchParams.set('sort', choice);
        // console.log(url);
        window.location.href = url; // reloads the page
    });
}
