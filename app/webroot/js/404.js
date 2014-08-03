/**
 * Simple Spacebar redirect for 404 pages
 */
function keyHit(evt){
  var thisKey;

  if (evt) {
    thisKey = evt.which;
  } else {
    thisKey = window.event.keyCode;
  }

  if(thisKey === '32') {
    window.location = 'http://google.com';
  }
}

document.onkeydown = keyHit;
