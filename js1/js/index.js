var initContacts = [
    {
        "name":"Vitalii",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Sveta",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Baba Petya",
        "phone":"+380501252333",
        "show":"1"
    },
    {
        "name":"Ordo",
        "phone":"+380508892333",
        "show":"1"
    },
    {
        "name":"Totto",
        "phone":"+380501232333",
        "show":"1"
    },
    {
        "name":"Barmaid",
        "phone":"+380501252333",
        "show":"1"
    },
    {
        "name":"Yokko",
        "phone":"+380456122333",
        "show":"1"
    },
    {
        "name":"Yet another contact",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Moose",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Boss",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"UnderBoss",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Poppy",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Kiki",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Chotki",
        "phone":"+380501122333",
        "show":"1"
    },
    {
        "name":"Dude",
        "phone":"+380501122333",
        "show":"1"
    },

    {
        "name":"Vasyl",
        "phone":"+380501122333",
        "show":"1"
    }];

var contacts = [];

(function(){
    window.onload = function () {
        console.log('window is loaded');
    };

    function cancel() {
        var editDiv = document.getElementsByClassName('edit')[0];
        editDiv.style.display = "none";
    }

    function save() {
        var editDiv = document.getElementsByClassName('edit')[0];
        var index = editDiv.getAttribute("index");
        var name = document.getElementById("name").value;
        var phone = document.getElementById("phone").value;
        console.log("index " + index);
        console.log("name " + name);
        console.log("phone " + phone);

        if (index == "-1") {
            // New record
            var newContact = {};
            newContact.name = name;
            newContact.phone = phone;
            contacts.push(newContact);
        }
        else {
            // Save info
            contacts[index].name = name;
            contacts[index].phone = phone;
        }

        saveToStorage();
        editDiv.style.display = "none";
        filter();
    }

    function del() {
        var editDiv = document.getElementsByClassName('edit')[0];
        var index = editDiv.getAttribute("index");
        contacts.splice(index, 1);

        saveToStorage();
        editDiv.style.display = "none";
        filter();
    }

    function edit(event) {
        var editDiv = document.getElementsByClassName('edit')[0];
        editDiv.style.display = "flex";
        var name = document.getElementById("name");
        var phone = document.getElementById("phone");
        var index = event.target.getAttribute("index");
        console.log("index " + index);

        editDiv.setAttribute("index", index);
        if (index == "-1") {
            name.value = "";
            phone.value = "";
        }
        else {
            name.value = contacts[index].name;
            phone.value = contacts[index].phone;
        }
        name.focus();
    }

    function filter() {
        var str = document.getElementById("filter").value;
        contacts.forEach(function(contact) {
            if (contact.name.toLowerCase().includes(str.toLowerCase())) {
                contact.show = 1;
            }
            else {
                contact.show = 0;
            }
        });
        show();
    }

    function clearFilter() {
        var filterRow = document.getElementById("filter");
        filterRow.value = "";
        filter();
    }

    function show() {
        var contactsDiv = document.getElementsByClassName('contacts')[0];
        while (contactsDiv.firstChild) {
            contactsDiv.removeChild(contactsDiv.firstChild);
        }

        contacts.forEach(function(contact, index) {
            if (contact.show == 1) {
                var contactDiv = document.createElement('div');
                contactDiv.classList.add("contact");
                contactDiv.innerText = contact.name;
                contactDiv.setAttribute("index", index);
                contactDiv.addEventListener("click", edit);
                contactsDiv.appendChild(contactDiv);
            }
        });
    }

    function saveToStorage() {
        contacts.sort(function(a, b) {
            return (a.name.toLowerCase() > b.name.toLowerCase());
        });
        localStorage.setItem('contacts', JSON.stringify(contacts));
    }

    function loadFromStorage() {
        contacts = JSON.parse(localStorage.getItem("contacts") || "[]");
        console.log("# of contacts: " + contacts.length);
        contacts.sort(function(a, b) {
            return (a.name > b.name);
        });
        contacts.forEach(function(contact) {
            contact.show = 1;
        })
    }

    document.addEventListener("DOMContentLoaded", function () {
        if (localStorage.getItem('contacts') == null) {
            contacts = initContacts;
            saveToStorage();
        }
        loadFromStorage();
        show();

        var filterInput = document.getElementById('filter');
        filterInput.addEventListener('input', filter);

        var cancelButton = document.getElementsByClassName('cancel')[0];
        cancelButton.addEventListener("click", cancel);

        var saveButton = document.getElementsByClassName('save')[0];
        saveButton.addEventListener("click", save);

        var deleteButton = document.getElementsByClassName('delete')[0];
        deleteButton.addEventListener("click", del);

        var clearFilterButton = document.getElementsByClassName('clearFilter')[0];
        clearFilterButton.addEventListener("click", clearFilter);

        var addButton = document.getElementsByClassName('add')[0];
        addButton.addEventListener("click", edit);

    });
})();