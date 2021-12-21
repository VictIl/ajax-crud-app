
<style>* {
  margin: 0;
  padding: 0;

}body{
        overflow: hidden;
    background: linear-gradient(90deg,#03d0df,#000000,#ff00f2,#6c00e7);
    width: calc(100% + 0.533vw);
    background-size: 400%;
    height: calc(100% + 0.533vw);
    z-index: -1;
    animation: ann 20s linear infinite;
}
body:after {
    filter: blur(0.467vw);
}

@keyframes ann {
    0% {
        background-position: 0 0;
    }

    50% {
        background-position: 200% 0;
    }

    100% {
        background-position: 300% 0;
    }
}

.main {
  height: 100vh;
  width: 100vw;
  position: relative;
}
.d1 {
  position: absolute;
  background-image: url(img/tur.jpg);
  background-size: 2000px 1500px;

  height: 30vh;
  width: 0vw;

  background-position: 0 50%;

  box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.8);
  top: 50%;
  transform: translateY(-50%);
  z-index: 2;
  animation: dd1 10s 1, dd12 10s 1;
  animation-delay: 4s, 14s;
}
.d2 {
  position: absolute;

  background-size: 2000px 1500px;

  height: 50vh;
  width: 0vw;

  background-position: -10vw 50%;
  left: 10vw;

  top: 50%;
  transform: translateY(-50%);
  z-index: 1;
  animation: dd12 10s 2;
  animation-delay: 4s;
}
.main .d3 {
  position: absolute;
  background-image: url(img/tur.jpg);
  background-size: 2000px 1500px;
  overflow: hidden;
  opacity:0.9;
  height: 0;
  width: 0;
  left: 25vw;
  box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.8);
  background-position: -35vw 50%;

  top: 50%;
  transform: translateY(-50%);
  z-index: 3;
  animation: dd3 10s 2;
  animation-delay: 4s;
}
.d4 {
  position: absolute;
  overflow: hidden;
  background-image: url(img/tur.jpg);
  background-size: 2000px 1500px;

  height: 0;
  width: 25vw;

  left: 60vw;
  background-position: -70vw 50%;

  top: 50%;
  transform: translateY(-50%);
  z-index: 1;
  animation: dd4 10s 2;
  animation-delay: 4s;
}

@keyframes dd1 {
  0% {
  }
  50% {
    width: 100vw;
  }
}
@keyframes dd12 {
  0% {
  }
  50% {
    width:65vw;
    background-position: Calc(0vw - 40px) 50%;
  }
}
@keyframes dd2 {
  0% {
  }
  50% {
    background-position: Calc(-10vw - 40px) 50%;
  }
}
@keyframes dd3 {
  0% {
  }
  50% {height:300vh;width:40vw;
    background-position: Calc(-35vw - 40px) 50%;
  }
}
@keyframes dd4 {
  0% {
  }

  50% {height:40vw;
    background-position: Calc(-70vw - 40px) 50%;
  }
}

.main div{
    border-radius:6px;
   
}
</style>

<div class="main">
    <div class="d1"></div>
    <div class="d2"</div>
    <div class="d3"></div>
    <div class="d4"></div>
</div>
<div>form</div>