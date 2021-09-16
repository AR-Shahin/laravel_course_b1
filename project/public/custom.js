// console.log('Hello');

const setSuccessMessage = (title = 'Data Save Successfully!') => {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: title
      })
}
// setSuccessMessage()

let base_path = window.location.origin;


let base_url = window.location.origin;
function test(){
    Swal.fire('test')
}

const log = (el = 'Ok') => console.log(el);
