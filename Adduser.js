window.addEventListener('load', ()=>{


    
    const fnameInput = document.querySelector("#fname")
    const lnameInput = document.querySelector("#lname")
    const passwordInput = document.querySelector("#password")
    const emailInput = document.querySelector("#email")

    
    const drop_Select = document.querySelector('.select')
    const drop_Caret = document.querySelector('.caret')
    const drop_Menu = document.querySelector('.menu')
    const drop_Options = document.querySelectorAll('.menu li')
    const drop_Selected = document.querySelector('.selected')

    const saveBtn = document.querySelector("button")
    const controls = document.querySelector(".controls")
    const msgBox = document.querySelector(".msg")

    saveBtn.addEventListener('click', (e) => {
        e.preventDefault()

        fieldsOK = true

        if(fnameInput.value.trim() == " ")
        {
            fieldsOK = false
            msg = document.querySelector(".fnameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a First Name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".fnameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

         if(lnameInput.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".lnameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a Last Name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".lnameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        
        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!emailInput.value.trim().match(mailformat))
        {
            fieldsOK = false
            msg = document.querySelector(".emailMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a valid email'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".emailMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        if(passwordInput.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".passwordMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a password'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".passwordMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }
         

        if(fieldsOK)
        {
            msgBox.textContent = "Created New User Successfully"
            controls.classList.remove('fail')
            controls.classList.add('success')

            console.log("FIELDSOK")
            fetch('addUser.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: `fname=${fnameInput.value.trim()}&lname=${lnameInput.value.trim()}&email=${emailInput.value.trim()}&password=${passwordInput.value.trim()}&role=${drop_Selected.textContent}`
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something went wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })      

        }
        else
        {
            msgBox.textContent = "Could not create a new user"
            controls.classList.add('fail')
            controls.classList.remove('success')
        }


    })

    drop_Select.addEventListener('click', (e) => {
        drop_Caret.classList.toggle('caret-rotate')
        drop_Menu.classList.toggle('menu-open')
        drop_Select.classList.toggle('select-clicked')
        
    })

    drop_Options.forEach(option => {
        option.addEventListener('click', () => {
            drop_Selected.textContent = option.textContent
            drop_Select.classList.remove('select-clicked')
            drop_Menu.classList.remove('menu-open')
            drop_Caret.classList.remove('carer-rotate')

            drop_Options.forEach(option => {
                option.classList.remove('active')
            })

            option.classList.add('active')
        })
    })
})