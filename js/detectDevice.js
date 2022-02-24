document.addEventListener("DOMContentLoaded", initDetect)

function initDetect(){
  window.addEventListener("resize", detectDevice)
  detectDevice()
}

 detectDevice = () => {
  let detectObj = {
    device: !!navigator.maxTouchPoints ? 'mobile' : 'computer',
    orientation: !navigator.maxTouchPoints ? 'desktop' : !window.screen.orientation.angle ? 'portrait' : 'landscape'
  }

  console.log(detectObj)
  return detectObj
}