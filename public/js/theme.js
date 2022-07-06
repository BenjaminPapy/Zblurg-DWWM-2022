//We're going to use "check" to get the ckeckbox element
const checkbox = document.getElementById("checkbox");
const icon = document.getElementById("icon-theme");

//If darkMode doesn’t exist in the LocalStorage, create it. False by default
if (localStorage.getItem('darkMode')===null){
    localStorage.setItem('darkMode', "false");
}

//checkStatus is only called one time in the program, when you reload the page
//It gives the page it's default look, depening on waht darkMode is set to
checkStatus()


function checkStatus(){
    if (localStorage.getItem('darkMode')==="true"){
        //the checkbox is checked (if you load the page by default it isn’t)
        check.checked = true;

        document.documentElement.style.setProperty('--header-footer',
        '#3d3d3d')

        document.documentElement.style.setProperty('--first-background',
        '#282828')

        document.documentElement.style.setProperty('--second-background',
        '#383838')

        document.documentElement.style.setProperty('--third-background',
        '#484848')

        document.documentElement.style.setProperty('--fourth-background',
        '#585858')

        document.documentElement.style.setProperty('--input-background',
        '#b7bbc1')

        document.documentElement.style.setProperty('--border',
        '#3d3d3d')

        document.documentElement.style.setProperty('--text-icons',
        '#bfbfbf')

        document.documentElement.style.setProperty('--text-light',
        '#dde1e7')
        
        document.documentElement.style.setProperty('--text-light-second',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-green',
        '#37b602')

        document.documentElement.style.setProperty('--first-shadow-header-footer',
        '#343434')

        document.documentElement.style.setProperty('--second-shadow-header-footer',
        '#464646')

        document.documentElement.style.setProperty('--first-shadow-first-background',
        '#1b1b1b')

        document.documentElement.style.setProperty('--second-shadow-first-background',
        '#252525')

        document.documentElement.style.setProperty('--first-shadow-second-background',
        '#303030')

        document.documentElement.style.setProperty('--second-shadow-second-background',
        '#404040')

        document.documentElement.style.setProperty('--first-shadow-third-background',
        '#3d3d3d')

        document.documentElement.style.setProperty('--second-shadow-third-background',
        '#535353')

        document.documentElement.style.setProperty('--first-shadow-fourth-background',
        '#4b4b4b')

        document.documentElement.style.setProperty('--second-shadow-fourth-background',
        '#656565')

    } else {

        check.checked = false;
        
        document.documentElement.style.setProperty('--header-footer',
        '#888888')

        document.documentElement.style.setProperty('--first-background',
        '#dde1e7')

        document.documentElement.style.setProperty('--second-background',
        '#E8E8E8')

        document.documentElement.style.setProperty('--third-background',
        '#D0D0D0')

        document.documentElement.style.setProperty('--fourth-background',
        '#B8B8B8')
        
        document.documentElement.style.setProperty('--input-background',
        '#b7bbc1')

        document.documentElement.style.setProperty('--border',
        '#A0A0A0')

        document.documentElement.style.setProperty('--text-icons',
        '#484848')

        document.documentElement.style.setProperty('--text-light',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-light-second',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-green',
        '#37b602')

        document.documentElement.style.setProperty('--first-shadow-header-footer',
        '#666666')

        document.documentElement.style.setProperty('--second-shadow-header-footer',
        '#8a8a8a')

        document.documentElement.style.setProperty('--first-shadow-first-background',
        '#bcbfc4')
        
        document.documentElement.style.setProperty('--second-shadow-first-background',
        '#feffff')

        document.documentElement.style.setProperty('--first-shadow-second-background',
        '#c5c5c5')

        document.documentElement.style.setProperty('--second-shadow-second-background',
        '#ffffff')

        document.documentElement.style.setProperty('--first-shadow-third-background',
        '#b1b1b1')

        document.documentElement.style.setProperty('--second-shadow-third-background',
        '#efefef')

        document.documentElement.style.setProperty('--first-shadow-fourth-background',
        '#9c9c9c')

        document.documentElement.style.setProperty('--second-shadow-fourth-background',
        '#d4d4d4')

    }
}



//This function gets called every time the checkbox is clicked 
function changeStatus(){             
    //if darkMode was active and this function is called it means the user now wants light
    if (localStorage.getItem('darkMode')==="true"){
        //so we set it to false, to indicate we are in light mode
        localStorage.setItem('darkMode', "false");
        icon.classList.toggle('fa-sun')

        document.documentElement.style.setProperty('--header-footer',
        '#888888')

        document.documentElement.style.setProperty('--first-background',
        '#dde1e7')

        document.documentElement.style.setProperty('--second-background',
        '#E8E8E8')

        document.documentElement.style.setProperty('--third-background',
        '#D0D0D0')

        document.documentElement.style.setProperty('--fourth-background',
        '#B8B8B8')

        document.documentElement.style.setProperty('--input-background',
        '#b7bbc1')

        document.documentElement.style.setProperty('--border',
        '#A0A0A0')

        document.documentElement.style.setProperty('--text-icons',
        '#484848')

        document.documentElement.style.setProperty('--text-light',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-light-second',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-green',
        '#37b602')

        document.documentElement.style.setProperty('--first-shadow-header-footer',
        '#343434')

        document.documentElement.style.setProperty('--second-shadow-header-footer',
        '#8a8a8a')

        document.documentElement.style.setProperty('--first-shadow-first-background',
        '#666666')

        document.documentElement.style.setProperty('--second-shadow-first-background',
        '#feffff')

        document.documentElement.style.setProperty('--first-shadow-second-background',
        '#c5c5c5')

        document.documentElement.style.setProperty('--second-shadow-second-background',
        '#ffffff')

        document.documentElement.style.setProperty('--first-shadow-third-background',
        '#b1b1b1')

        document.documentElement.style.setProperty('--second-shadow-third-background',
        '#efefef')

        document.documentElement.style.setProperty('--first-shadow-fourth-background',
        '#9c9c9c')

        document.documentElement.style.setProperty('--second-shadow-fourth-background',
        '#d4d4d4')

    } else {
        
        //same code but adapted for dark theme
        localStorage.setItem('darkMode', "true");
        icon.classList.toggle('fa-sun')

        document.documentElement.style.setProperty('--header-footer',
        '#3d3d3d')

        document.documentElement.style.setProperty('--first-background',
        '#282828')

        document.documentElement.style.setProperty('--second-background',
        '#383838')

        document.documentElement.style.setProperty('--third-background',
        '#484848')

        document.documentElement.style.setProperty('--fourth-background',
        '#585858')

        document.documentElement.style.setProperty('--input-background',
        '#b7bbc1')

        document.documentElement.style.setProperty('--border',
        '#3d3d3d')

        document.documentElement.style.setProperty('--text-icons',
        '#bfbfbf')

        document.documentElement.style.setProperty('--text-light',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-light-second',
        '#dde1e7')

        document.documentElement.style.setProperty('--text-green',
        '#37b602')

        document.documentElement.style.setProperty('--first-shadow-header-footer',
        '#343434')

        document.documentElement.style.setProperty('--second-shadow-header-footer',
        '#464646')

        document.documentElement.style.setProperty('--first-shadow-first-background',
        '#1b1b1b')

        document.documentElement.style.setProperty('--second-shadow-first-background',
        '#252525')

        document.documentElement.style.setProperty('--first-shadow-second-background',
        '#303030')

        document.documentElement.style.setProperty('--second-shadow-second-background',
        '#404040')

        document.documentElement.style.setProperty('--first-shadow-third-background',
        '#3d3d3d')

        document.documentElement.style.setProperty('--second-shadow-third-background',
        '#535353')

        document.documentElement.style.setProperty('--first-shadow-fourth-background',
        '#4b4b4b')

        document.documentElement.style.setProperty('--second-shadow-fourth-background',
        '#656565')
    }
}