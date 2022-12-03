const forceKeyPressUppercase = (e) => {
    let el = e.target;
    let charInput = e.keyCode;
    if((charInput >= 97) && (charInput <= 122)) { // lowercase
      if(!e.ctrlKey && !e.metaKey && !e.altKey) { // no modifier key
        let newChar = charInput - 32;
        let start = el.selectionStart;
        let end = el.selectionEnd;
        el.value = el.value.substring(0, start) + String.fromCharCode(newChar) + el.value.substring(end);
        el.setSelectionRange(start+1, start+1);
        e.preventDefault();
      }
    }
  };
    
    document.getElementById("name").addEventListener("keypress", function(e) {
      if(0 == this.selectionStart) {
        // uppercase first letter
        forceKeyPressUppercase(e);
      }
    }, false);
  
  
    document.getElementById("surname").addEventListener("keypress", function(e) {
      if(0 == this.selectionStart) {
        // uppercase first letter
        forceKeyPressUppercase(e);
      }
    }, false);