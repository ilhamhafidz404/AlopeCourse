<div>
    <style>
        .walkthrough {
          box-shadow: 0 6px 12px rgba(0, 0, 0, 0.23),
            0 10px 40px rgba(0, 0, 0, 0.19);
          background: linear-gradient(to right bottom, #9e66c6, #6027e1);
          border-radius: 0;
          display: none;
          flex-direction: column;
          flex: 0 0 auto;
          font-size: 14px;
          height: 300px;
          overflow: hidden;
          transition: opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          width: 280px;
          z-index: 1000;
        }
        .walkthrough.show {
          display: flex;
          opacity: 0;
          transform: translateY(72px);
        }
        .walkthrough.reveal {
          opacity: 1;
          transform: translateY(0);
        }
        .walkthrough .walkthrough-body {
          align-items: center;
          display: flex;
          flex: 1;
          text-align: center;
        }
        .walkthrough .walkthrough-body .prev-screen,
        .walkthrough .walkthrough-body .next-screen {
          align-self: stretch;
          background: none;
          border: 0;
          margin-top: 40px;
          color: rgba(255, 255, 255, 0.25);
          cursor: pointer;
          flex: 0 0 auto;
          font-size: 24px;
          opacity: 1;
          outline: none;
          padding: 16px;
          transform: scale(1);
          transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            color 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          z-index: 1000;
        }
        .walkthrough .walkthrough-body .prev-screen:hover,
        .walkthrough .walkthrough-body .next-screen:hover,
        .walkthrough .walkthrough-body .prev-screen:active,
        .walkthrough .walkthrough-body .next-screen:active {
          color: white;
          transform-origin: center;
          transform: scale(1.25);
        }
        .walkthrough .walkthrough-body .prev-screen:disabled,
        .walkthrough .walkthrough-body .next-screen:disabled {
          opacity: 0;
        }
        .walkthrough .walkthrough-body .prev-screen {
          order: 1;
        }
        .walkthrough .walkthrough-body .next-screen {
          order: 3;
        }
        .walkthrough .walkthrough-body .screens {
          flex: 1;
          align-self: stretch;
          position: relative;
          margin: 0 -16px;
          padding: 0;
          order: 2;
        }
        .walkthrough .walkthrough-body .screens .screen {
          position: absolute;
          list-style-type: none;
        }
        .walkthrough .walkthrough-body .media {
          background: rgba(255, 255, 255, 0.25);
          border-radius: 132px;
          height: 80px;
          margin: 20px auto;
          width: 80px;
        }
        .walkthrough .walkthrough-body h3 {
          font-size: 15px;
          line-height: 1.4em;
          text-transform: uppercase;
          letter-spacing: 0.15em;
        }
        .walkthrough .walkthrough-body p {
          line-height: 1.6em;
          font-size: 13px;
          margin-top: 16px;
          padding-top: 0;
          color: rgba(255, 255, 255, 0.8);
        }
        .walkthrough .walkthrough-pagination {
          align-items: center;
          display: flex;
          justify-content: center;
          margin-top: 24px;
        }
        .walkthrough .walkthrough-pagination .dot {
          background: rgba(0, 0, 0, 0.25);
          border-radius: 8px;
          height: 8px;
          margin: 0 4px;
          transform: scale(0.75);
          transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            background 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          width: 8px;
        }
        .walkthrough .walkthrough-pagination .dot.active {
          background: white;
          transform: scale(1);
          transition-delay: 0.4s;
        }
        .walkthrough .walkthrough-footer {
          display: flex;
          flex: 0 0 auto;
          justify-content: space-around;
          padding: 0;
        }
        .walkthrough .walkthrough-footer button {
          height: 40px;
          border: 0;
          background: #5da3f2;
          font-weight: bold;
          text-transform: uppercase;
          letter-spacing: 0.15em;
          border-radius: 0;
          color: white;
          flex: 1;
          font-size: 12px;
          margin: 0;
          outline: 0;
          padding: 12px;
          transition: opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            background 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          cursor: pointer;
        }
        .walkthrough .walkthrough-footer button:hover {
          background: #6babf3;
        }
        .walkthrough .walkthrough-footer button:active {
          background: #5da3f2;
        }
        .walkthrough .walkthrough-footer button:disabled {
          cursor: pointer;
        }
        .walkthrough .walkthrough-footer button.finish {
          background: #3e94f5;
          position: absolute;
          left: 0;
          bottom: 0;
          width: 100%;
          opacity: 0;
          transform: scale(0, 1);
          transform-origin: center;
          transition: opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            background 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .walkthrough .walkthrough-footer button.finish:hover {
          background: #4d9cf6;
        }
        .walkthrough .walkthrough-footer button.finish:active {
          background: #3e94f5;
        }
        .walkthrough .walkthrough-footer button.finish.active {
          transform: scale(1, 1);
          opacity: 1;
        }
        .walkthrough .screens {
          margin: 0;
        }
        .walkthrough .screens .media .status-badge {
          left: 136px;
          opacity: 0;
          position: absolute;
          top: 104px;
          transform: scale(0);
          transition: opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          transition-delay: 0.6s;
        }
        .walkthrough .screens .media .status-badge i {
          display: inline;
        }
        .walkthrough .screens .media.logo .logo {
          margin-top: 10px;
          opacity: 0;
          transform: translateY(-60px);
          transition: opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          width: 50px;
        }
        .walkthrough .screens .media .icon {
          position: absolute;
          opacity: 0;
          transform: translateY(-30px);
          transition: opacity 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),
            transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
          width: 132px;
          left: 48px;
          top: 32px;
        }
        .walkthrough .screens .media.bars .icon {
          transform: translate(40px, 20px);
        }
        .walkthrough .screens .media.bars .icon:nth-of-type(2) {
          transform: scale(0.25);
          transform-origin: 30% 54%;
        }
        .walkthrough .screens .media.bars .icon:nth-of-type(3) {
          transform: scale(0.25);
          transform-origin: 30% 40%;
        }
        .walkthrough .screens .media.bars .icon:nth-of-type(4) {
          transform: scale(0.25);
          transform-origin: 30% 26%;
        }
        .walkthrough .screens .media.files .icon {
          transform: translate(40px, 20px);
        }
        .walkthrough .screens .media.comm .icon {
          transform: scale(0.25);
          transform-origin: 29% 73%;
        }
        .walkthrough .screens .media.comm .icon:nth-child(2) {
          transform-origin: 66% 85%;
        }
        .walkthrough .screens .screen {
          opacity: 0;
          position: absolute;
          transform: translateX(-72px);
          transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .walkthrough .screens .screen.active {
          opacity: 1;
          transform: translateX(0) scale(1);
          transition-delay: 0.4s;
        }
        .walkthrough .screens .screen.active ~ .screen {
          opacity: 0;
          transform: translateX(72px);
        }
        .walkthrough .screens .screen.active .media .status-badge {
          opacity: 1;
          transform: scale(1.75);
        }
        .walkthrough .screens .screen.active .media.logo .logo {
          opacity: 0.8;
          transform: translateY(0);
          transition-delay: 0.6s;
        }
        .walkthrough .screens .screen.active .media.logo .status-badge {
          transition-delay: 1s;
        }
        .walkthrough .screens .screen.active .media.books .icon {
          opacity: 1;
          transform: translateY(0);
          transition-delay: 0.6s;
        }
        .walkthrough .screens .screen.active .media.books .icon:nth-child(2) {
          transition-delay: 0.725s;
        }
        .walkthrough .screens .screen.active .media.books .icon:nth-child(3) {
          transition-delay: 0.85s;
        }
        .walkthrough .screens .screen.active .media.books .status-badge {
          transition-delay: 1.4s;
        }
        .walkthrough .screens .screen.active .media.bars .icon {
          opacity: 1;
          transform: translate(0) scale(1);
          transition-delay: 0.6s;
        }
        .walkthrough .screens .screen.active .media.bars .icon:nth-child(2) {
          transition-delay: 1.05s;
        }
        .walkthrough .screens .screen.active .media.bars .icon:nth-child(3) {
          transition-delay: 0.925s;
        }
        .walkthrough .screens .screen.active .media.bars .icon:nth-child(4) {
          transition-delay: 0.8s;
        }
        .walkthrough .screens .screen.active .media.files .icon {
          opacity: 1;
          transform: translateY(0);
          transition-delay: 0.9s;
        }
        .walkthrough .screens .screen.active .media.files .icon:nth-child(3) {
          transition-delay: 0.8s;
        }
        .walkthrough .screens .screen.active .media.files .icon:nth-child(2) {
          transition-delay: 0.7s;
        }
        .walkthrough .screens .screen.active .media.files .icon:nth-child(1) {
          transition-delay: 0.6s;
        }
        .walkthrough .screens .screen.active .media.files .status-badge {
          transition-delay: 1.6s;
        }
        .walkthrough .screens .screen.active .media.comm .icon {
          opacity: 1;
          transform: scale(1);
          transition-delay: 0.6s;
        }
        .walkthrough .screens .screen.active .media.comm .icon:nth-child(2) {
          transition-delay: 0.8s;
        }
        .walkthrough .screens .screen.active .media.comm .status-badge {
          transition-delay: 1.6s;
        }
    </style>
    <div class="walkthrough show reveal mx-auto mt-3">
      <div class="walkthrough-pagination">
        <a class="dot active"></a>
        <a class="dot"></a>
        <a class="dot"></a>
        <a class="dot"></a>
      </div>
      <div class="walkthrough-body">
        <ul class="screens animate">
          <li class="screen active">
            <div class="media logo">
              <img
                class="logo"
                src="https://s3.amazonaws.com/jebbles-codepen/icon.png"
              />
            </div>
            <h3>
              Siver Access
              <br />
            </h3>
            <p>
              Dapatkan ALOPE Premium Access selama 1 Bulan.
            </p>
          </li>
          <li class="screen">
            <div class="media logo">
              <img
                class="logo"
                src="https://s3.amazonaws.com/jebbles-codepen/icon.png"
              />
            </div>
            <h3>
              Gold Access
              <br />
            </h3>
            <p>
              Dapatkan ALOPE Premium Access selama 1 Bulan.
            </p>
          </li>
          <li class="screen">
            <div class="media logo">
              <img
                class="logo"
                src="https://s3.amazonaws.com/jebbles-codepen/icon.png"
              />
            </div>
            <h3>
              Platinum Access
              <br />
            </h3>
            <p>
              Dapatkan ALOPE Premium Access selama 1 Bulan.
            </p>
          </li>
          <li class="screen">
            <div class="media logo">
              <img
                class="logo"
                src="https://s3.amazonaws.com/jebbles-codepen/icon.png"
              />
            </div>
            <h3>
              Forever Access
              <br />
            </h3>
            <p>
              Dapatkan ALOPE Premium Access selama 1 Bulan.
            </p>
          </li>
        </ul>
        <button class="prev-screen">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="next-screen">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
      <div class="walkthrough-footer">
        <button class="button next-screen">Next</button>
        <button class="button finish close" disabled="true">Finish</button>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script>
      (function () {
        $(document).ready(function () {
          var walkthrough;
          walkthrough = {
            index: 0,
            nextScreen: function () {
              if (this.index < this.indexMax()) {
                this.index++;
                return this.updateScreen();
              }
            },
            prevScreen: function () {
              if (this.index > 0) {
                this.index--;
                return this.updateScreen();
              }
            },
            updateScreen: function () {
              this.reset();
              this.goTo(this.index);
              return this.setBtns();
            },
            setBtns: function () {
              var $lastBtn, $nextBtn, $prevBtn;
              $nextBtn = $(".next-screen");
              $prevBtn = $(".prev-screen");
              $lastBtn = $(".finish");
              if (walkthrough.index === walkthrough.indexMax()) {
                $nextBtn.prop("disabled", true);
                $prevBtn.prop("disabled", false);
                return $lastBtn.addClass("active").prop("disabled", false);
              } else if (walkthrough.index === 0) {
                $nextBtn.prop("disabled", false);
                $prevBtn.prop("disabled", true);
                return $lastBtn.removeClass("active").prop("disabled", true);
              } else {
                $nextBtn.prop("disabled", false);
                $prevBtn.prop("disabled", false);
                return $lastBtn.removeClass("active").prop("disabled", true);
              }
            },
            goTo: function (index) {
              $(".screen").eq(index).addClass("active");
              return $(".dot").eq(index).addClass("active");
            },
            reset: function () {
              return $(".screen, .dot").removeClass("active");
            },
            indexMax: function () {
              return $(".screen").length - 1;
            },
            closeModal: function () {
              $(".walkthrough, .shade").removeClass("reveal");
              return setTimeout(
                (function (_this) {
                  return function () {
                    $(".walkthrough, .shade").removeClass("show");
                    _this.index = 0;
                    return _this.updateScreen();
                  };
                })(this),
                200
              );
            },
            openModal: function () {
              $(".walkthrough, .shade").addClass("show");
              setTimeout(
                (function (_this) {
                  return function () {
                    return $(".walkthrough, .shade").addClass("reveal");
                  };
                })(this),
                200
              );
              return this.updateScreen();
            },
          };
          $(".next-screen").click(function () {
            return walkthrough.nextScreen();
          });
          $(".prev-screen").click(function () {
            return walkthrough.prevScreen();
          });
          $(".close").click(function () {
            return walkthrough.closeModal();
          });
          $(".open-walkthrough").click(function () {
            return walkthrough.openModal();
          });
          walkthrough.openModal();
          return $(document).keydown(function (e) {
            switch (e.which) {
              case 37:
                walkthrough.prevScreen();
                break;
              case 38:
                walkthrough.openModal();
                break;
              case 39:
                walkthrough.nextScreen();
                break;
              case 40:
                walkthrough.closeModal();
                break;
              default:
                return;
            }
            e.preventDefault();
          });
        });
      }.call(this));
    </script>
</div>