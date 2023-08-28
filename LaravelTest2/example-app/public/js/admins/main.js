var sidebar = document.getElementById('sidebar');

function sidebarToggle() {
    if (sidebar.style.display === "none") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
}

var profileDropdown = document.getElementById('ProfileDropDown');

function profileToggle() {
    if (profileDropdown.style.display === "none") {
        profileDropdown.style.display = "block";
    } else {
        profileDropdown.style.display = "none";
    }
}


/**
 * ### Modals ###
 */

function toggleModal(action, elem_trigger)
{
    elem_trigger.addEventListener('click', function () {
        if (action == 'add') {
            let modal_id = this.dataset.modal;
            document.getElementById(`${modal_id}`).classList.add('modal-is-open');
        } else {
            // Automaticlly get the opned modal ID
            let modal_id = elem_trigger.closest('.modal-wrapper').getAttribute('id');
            document.getElementById(`${modal_id}`).classList.remove('modal-is-open');
        }
    });
}


// Check if there is modals on the page
if (document.querySelector('.modal-wrapper'))
{
    // Open the modal
    document.querySelectorAll('.modal-trigger').forEach(btn => {
        toggleModal('add', btn);
    });
    
    // close the modal
    document.querySelectorAll('.close-modal').forEach(btn => {
        toggleModal('remove', btn);
    });
}

//dropdown menu
document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll('.menu-item');
  
    menuItems.forEach((item) => {
      const submenu = item.querySelector('.submenu');
      if (submenu) {
        submenu.style.display = 'none'; // Mặc định ẩn các menu con
  
        item.addEventListener('click', () => {
          if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
          } else {
            submenu.style.display = 'block';
          }
        });
      }
    });
  });
  
  const currentTimeContainer = document.getElementById('current-time-container');

                                    function updateCurrentTime() {
                                        const currentTime = new Date();
                                        currentTimeContainer.textContent = `Current Time is : ${currentTime.toLocaleString()}`;
                                    }

                                    updateCurrentTime();
                                    setInterval(updateCurrentTime, 1000);