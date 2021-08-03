   <?php if(!defined('DVD_PATH'))
   {
    die(header("HTTP/1.1 500 Internal Server Error"));
   }  
   else{
     echo "<section id='contact-section'>";
     if(!isset(_DATA_['Act']))
     {
     ?>
   <!-- contact section -->
           <div class="container">
           	 <h2>Contact Us</h2>
              <p>Email us and keep up to date with our latest movies</p>
             <div class="contact-form">

                  <!-- First grid -->
               <div>
                 <a href="https://www.google.com.my/maps/place/Ayer+Keroh,+Malacca/@2.2616501,102.2231646,12z/data=!3m1!4b1!4m5!3m4!1s0x31d1e572dbf414d3:0x53f464b4e13621ae!8m2!3d2.269908!4d102.2944891?hl=en">
                 <img src="https://www.pngfind.com/pngs/m/45-451203_map-icon-png-map-location-icon-png-transparent.png" alt="W3Schools.com" width="50" height="50"><span class="form-info">  Ayer Keroh,Melaka</span><br>
                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAilBMVEUAAAD////u7u7p6env7+/q6uoEBATl5eX8/Pzz8/P29vb5+fkICAjW1tbg4OCmpqYtLS2AgIBDQ0POzs6rq6vAwMBtbW2MjIy1tbVkZGReXl4dHR2cnJyVlZVxcXE4ODgVFRVWVlZNTU07Ozu6urqQkJDQ0NAyMjJ3d3cjIyOFhYUSEhJQUFBHR0dOnjrdAAAUKElEQVR4nO1dh3rjKBAWqBiE5SbbceL0Tc/l/V/vKJKtAmhGkr3Jt5nbdpGA+UWZCgS0QhGNSZ1i+bOf/FRS8Ivw73P5i/AX4S/Cv8/lL8JfhP8WQkrDxtvhj3/6ryH8niNt6CiNDuT8Hj/2qaYgrFAcThpvT+TPfvJTScE3ZGvcp02Ef39ojf20ifA7LA/jPrX24YG+pwDAPf33EI40WiIbH1HULsuOXFqejsHVqeYhbT0V7PhvJtICHyswxpWSPwJhRKNaH7JJ9rRbz0ta756yCau+EEY/rw8Nwnj2sn67e13sP4M6fe4Xr3fL9cvM1FKdSz8DIVc/2FwsX4Muel1ebNTLvILx+0oLI3a5nGSTzUUntipdbKQuknKqy39baSG/vZqARPDrywUKn6LF5TUXsiejmMbRCREOGQ8hp6kgs/mD5jhJ1B8AaEn5chA8zGfy+1De5HL0UdpXP4wIzVd7w3UCg3cAmZjX96uckuiUeukQLZ6kN191vmEYj+/pv79u0mbFg2yLqimFN1skUfkgjmPOsiW4z7pomTEu65R1U9XEMPtwsI0fR3Ek51++nSKGpZ+SYLrNRUpLLWCYjV9dhtBLi66KRoLkW8NaMhxkWcc2JyIyumz/hYeO4GuT/Udmt+W3H4eKem5nJKU2hOfzJhrxR27uD4yNgfFYzf6GkMgxdvohRI/SiDKyno6AykXTNRG0JTzO4tVn6heleoCONTjblOihKps5GpJnQ6iJk/n9KQHquu/nhLMawDMizK5Gm3xOgPLXVYbiaiyE8qPmn8Fpe7AAGXzmY41SxFrKSDqeCtNNyxTEleVpf2kRPpwRoLQ6JiCuuhDCRqkeL5vFycdnlZJgsek7SvvppTulXZ1SEDYAKk1u18lV8+mA2NNNMI4OigEZBDcdXFmehj1iT9JOirbnhFahy4hL7uJTxp7UEBfxNjhv9xUkG93GqUtNHSv2xEPGVmDjfXSEwUqwGOnFwfnaaMwmD3D3xOgYldRgSFMD6U0U4uHsa0wFoYIoxIm8iUyJQR5+udouQKvuPe0H+Ao5wSjiuHmoVlEr+4mhqUF4Qnyy7m3TXzwmwkunpp1Y/3kaiJenQ3jjXWT2l9dhmj7fnRigEv0MzjMK4c6MRnvT97sZIany6t+dsheThgKHR2hbl4ovtrE1J/9Q6unHS1k2IvT9dABL2nTxjENonDJhO5yk+3MaTN+ySllOcHG1XrQIDVM9ENp7XFYlrixSQP/ksnQyFC2l2anxyWavxNF3M0rsiZFlYPfar15E41vy9OrUCCUvy06eHQjtejojL0FgleTPolY2VlEacX1qhIqR3CghTp4PCLvsQ/VTyrOmtZvoZXuVSTXHUhaluk4TvWRhNaHPjFMNbYTYE6dK1DcRKm/thEXW4eHWDCxkoCVon8EloSPEnkzshczbbE2VzS2OmUy1shuMSJwGq2sVGUc7RebEGrfp4U0Us3sLW/uNNKYcZekKM+jeUrlUPzl0eg/dz4STZwRC2c/k1sbvhog4ihxlbxGd+GciVOyFPiMBJsEtURNkqDdRKilrW/0z4hNEIYLTC6K+jlwX6VXBOfjrrJliADFKrfMwJc2ELUXPzbrqZcUKjvBD1qP6QYrwa+Rs/CSpPzWlG6HqwptWq/IbMz9CghCJX5E4+JrzV4wHYSoXO390EdKHeplptfnYqqtR1rI4OWlpHBNagNM3+ChNzGIzMPYUkbdWBE3++1rrqj6FEG4mJsFDRo6OiYsAnEqlRHI7vQgpLdLcWvmu6GF32U3JBoi2lTDvGlFOKm/pMGlBhc2/nag+7EA4eQXzqYbl6skgVL93mNVmK5prKU5aqC608XnbGg+NssoYAZIEKFXTYMlJmRa9sa3ejrKyEztGqV8vZQ7RfXf8Wq6yOCtRaoFf+WEuviD6/7butMHGnrKpbfGWPzEj0W+2QMGZP6ZV34RVybCVTaSN0WgXHnuStokcao5vSag3BiQNRTCXFVpK/U2WDUO1UE0Du0nawChtYTqhfWJPUcyj1DlaBG9nY9cGbZxm930gcm4G/HUJoBNhkHIeuyeax08jraYbZyNZ6ss313+TK6xbUfbYrRBFnjdopdIN3JAq03BvYkRT+uXkUeq89kzesnTUY5jqyAtLTT/wltXtArmiaWX5xHgTWX78Tk16Jl6zRe8KoniEcu4tpTat+4GD4Cl6YU6x7BulcpB6DIQlieLOxI0Ox6ljGbkVhbmQQVYaRSsSWV0NHQgpn+3dlV6l7T5sIWx7yUF0zQo15QKIcD/jtA9Ci3fmSO9h2p0UKTy7LpLEYUPIHz4VQpz/Aa5Vc9IHIRcPvvozwbvTiz5A/LUgvr8UNeYgDVUaJ4L3QJj6Z/oLAyS2ejS3/bXDL6O6dlFW+QZBKImnYIRhsRLKQXrtHSJSk+jOGJjZMUhF+0MVWN8X5m5rui0LFTW8g0TNla1z4BsoLeS75NJb9SPhTf0IjFAFVrQRoRNUE9uSudGxJaZkaqdbQz6/JAfPLURaROptPll4daYFAeS1OBHOdRcx4tSaVrxYbd5Bmttiwg3bYJ1GCsON3+81fUm7c5Mc/qhEqkRloY11vZwaZx7REqcToTZLoH14sA+0MPLVvRZu2yIudPw/doBJ8Fbp+b0Fg3ylyLhgj50QFZ8XBB978lesHRkdaX7M48WeE05NXItxu4Z+xWIVW2KQGEhpsDY+dEfsKejQmVaiIzTJX3wcLWMWcT1zWPzYAiH/f5qLSAutzs2ams1ju9DY06ZoyE2pbzcGM+EZD8T7tXJYq6KMWkfzf8V+Gb/UKrk8+geg3sTudION19fGlLTx5BfJ1eEtZmbpZpmln5IgUyZDxCce9fhIF/U+BCBcdk7wN38SRB64atC+XLU8/El1N0lT0uaVlVqB3rvWDs/aalyCEFZGWtzhs07UKKLWgyCIFtUgH8ZnTnQF3D4UMx2/YyCv3d2RdZhX3y6razTNUu50HwjYZoVFZoxXzm1q/rOO7nEKCmTNkAg7v5vKvWLOPiTPwNjD+0SYsrmlwCvTnxBmomRIhN0+lkSppo44PkgTCfQ6/x9VZkHIJAxLnJlpf5Fb7FRoh0TYbbYoKZtay8pG/sCsc7XcLIl2TLLI4sq/0dOUg5zLbxCEh1Q95tC3GrRmlDfLarrEhHKfmEaoXAr1MJ52haqPB1jYg+APZC2tcAkK/70RtY/bgvA6QCTHrOJImyltY0aKRKGmOkhze4UgrKTqgc61eJ+k9pVm9o5xBku5p8teNBAmJoshsqRkWWhhS+SjzthTCNIjgidzGklbL33D5NPsZ8bUDBtKkLKUtUpA024DI9gfeNcfvCv2BIw5PJCKwVS1LTKUQ/+amLJNa1dqPVTnrkHSyO5LcQGJPdFoB2NtH7fKmrAVw+1O5GSicFhazc2kgXhOdxEFx56oACIM1q2yZtCyHSZ1T8oyVVa8NFNYk8JkAPGzE80Fz4rQTFNgUEXKa/v23DgSIHFT1BJcyrKccvFY76ppaTLwCaAP16S54Hn60OvurvFm37wqOxEeeJK834Va7JDb1kMTTo9SwJAoHN8wb6JECFS6PuwIpboMTqhRojPXI6xhYWg/kelD0e2sgSLUIy2C9mFSMVrqo5TKZQMqMBL1/ZVUEBaLJlMaVgr54qoOsFcfiFBheLIhVAKSwKV+EjwQ45NpF/lSQiD3+25LhKB5iERYTpQGQm2aPwHxadIRQG7LG9hfzG9AVZwCoR6GWaNssdTQiNl2aLgoYjSmzGImJWVLo/YhdB7qVj/qZStqKsisK2hJSEq086rVROHW6awCiBC1lhrKyo0PLccUNDam6CF/yV+hYW0LgddSlDw09FEe3NlCiMioMf7FBLCgOAkjLaA6jaH9pFb2OEqVtwZKSfm7P0KUTgPWSzVfz6TShwdjKpZjN3qEV2Om24A+BOqlONvC8Pbp3n8EzsYw6XuDdom7bItB9mHB3NKEttofi5Kt3td0DnLah4NsfE1J8Kq9GbaAaTp7PdcRE04bv7r8Yf00how7pZ3mFmvJitJshpDTT1Nb4ZG+Nk167kRpe99DqH2dom0RnYYO6iPQm4gwYNUgvCDW8+pU1IEjBvwQ+mNXPAb4vOv0IlypGUp5O8dRISCfdwUhRlwoulIn0FoQSttdZWScYbXBxi3Q+7GfmKMPeUwA3s7hhI09AeKHdfrDubUPlT83RG247EnY+GFXDLhN18SGUNeKsqN6EiwGjIvjN+i+ue+hsqYpp80pjz8Dx/FxuRi1JnSMwYmQqzDuaQcqLBcDl09TJS0ONs7zGzlnW5Anohd15NP0zomqN6LefK2vplVjKkrlgnoqFbwjJ6pnXlu7kdpcUFQJ1MiqeXrCc2u8eW2NyQPPTbTRLtUHY1gT+dLJuz48xFbpMOgduYmN/wfnl1ppoZLxisB3SwEg+f5E+hsqv7SWI4xkRh37p3IXImrzl8SUSYjVHkwOfw9bZmXhPjnCXXneDpo7v2UsZcZLUFu+Fpfb7eV/g1U6XJ43OFffQlPFPGWOnPlQicWKPfx5nWtFi+26b2rpgojJ1Qfvt3DRKuSmhrZTQw2MF31M1uNHLXi8DIb2I2K/BXjPjJPeSMzVfLAcIiKlFNncPW5mnNS3J18Mmox998zgHN8VKuIHdoRUyHGZaj6q+s9u2Crbb9+Tf++akxK9YYha3DY6V7Y8k0g/PWBkZAfZV+Gi/Yz32Z0nRxTigJIjwkQd5RFZj7op/itnabUTuTVLGEio/Ye1PaTGrMNLxS+S+o/+sYxhEq6CAK1GmbczzB7SKh++fcC+NqUOxWyjlHr4CCM2+6/XcqP3AdsTCK0Ia/uxPXu5PQ2q9+eQXVH1p5Sxh359eEOOAFFn7kXcGlcHNCp/PRHcic2hyhjiPXZkqiTUtFi/QBK/ei6C70wFX5uqG6eZcNfsOGacRgJ/qKQ+U6HKNPLMveyznyBOgvcZj0PPYQ4OwDtYVsKhnSSZdp2L0e9sk26EwSsV3H4inybXoM1xsh9wtkl1gYOfTwNp+jHmsbtm58KTY6y2BHA+TW0NB54x1N2wXm4eeepexN3CY+bZEdYm3BlDFqPOek4UBKFi8oqlzpo94jHG6FK4c6JsETJy2zcJRBZ5TNPSZ4C5o0e8Bd2OPsPUG+6sLxsf9vPawBCLe8WwtxCBjgdN1HltDHX2pTXKaTlzD4pQsnAVCXwfyl58hvjBpnpTzbAT6dTFm9ZzE8EQH9XWLTRCykCXnX2qe0uHnptIMQnNdXzm9ypkeIQxBcVo1zotFYHQc35pP5C6G/e5Mt9wl1JILruyjZI+55cizqBFIDQ7RbHGlFwAXjs+bI8zaBHnCCMwBno0IY2pKOb6TAxfzcBzhP16aeE+BWw2duEzRu1H2tStOo2puGuYXhKzN7DrLGi/bXE4z7vvepoU+s1bM8rfeUtt3JFONYWe5w1pmDGz97z/ehPoDb/anFKhqW5jShkMX64m9U9fDp6ske57cp2rDwSYBIudvj49it1LWqVdtd/d2Z45V5918mxF6LobgVnvRkBglGWfmXJQgZQ4CXCyKD6OpTZ9hM+QuxGai7jrfgs4vkKFy0jpMO0UHvzRNy0G3G/hebvn6WsGojkmYpGX2787EeqURifEzeHToxH2vmcGSNtCE/cIMTmfuDNzcPg9M763mf+uIAglwSonnMceMa2OFXWfomDuCoLzPN59T3CIwQdh3KuIpOLD/SmTk9735L6zCwxQX4CXs9RtEHDBt+4ZmJzyzi7muXcNjlB/oaVo+ouP7RbnRjmng7537XADCx4h7O68YTAVzYtvduTSeDs42biviyruzsMZYjiEMS3uPxxEunu2md4uxQ7tcpX+lop14vZfKIDh0PsP/T0e8pipix0G96Iq/xFWetE0yOLL8qmlTKLvsAzHuMPSqeOputLB95AmBb+Lm6jSbkSZ0LFul+9SJSTFQppVuKgW8i5ZZRfwqLe1WIOpuuSQdCKrLa6JTtxBRHWXbIy+S7bLPnTdBzxSetp0J5hKMyBk5t0AkSS97wOG2Pjtpzt8yN3Kt/z9tZukKZ8tfTfuDbrTuboMIXx+49zLXX6l++5P0f9e7tpKi/CITUa6W70cCR1x0atx7lZHRYhS8AUWXoDH/AvfqF8aHci1pRqMEOOZlm3ln8FoK47nE2iHqytHHjlKsb53fQzwKUGayq+y+v2/50LIpBFE5ven7UUVQJsTzuoQz4NQX85Eyez2xH14OyO0cpHQOfuQ6OiiIKAwWF/6XJMygQxsLo0lLcq6pGp5sz988TG6MzkE5u6lFmNLTj+TtCBl3CbVQ7XgbRQqMMoBmlpjL+eRFgeE8iMLkpuklFE0uaKObU5EZI4PxSYB4mNP3qfax5uKfNvf698CGUy3uRAqpTjuyRUi9tQRIVKbmqi6/IizbBQlR9MyYzzW557rzDgsV/jYE/ApSW++TBeUXQHr1MZ7q5tmrHEQVzgbv+NpRGi+2h+YRqWnFTD3q5yS1t0gQ7jC+Wm6vDiUCzKbG6sjSQIYyDJuI+lhPiMipa17JYZwhfQmep9GsWqLE8GvL/GBqsXltfw+RWhqRK7GRKg8gmqocDmPJhtcuu/FRvabPg3VvhtlPIRDxkP1/mMdtt9cLLt3bb0uL7T5zge0O17cAiNqzbcMZ9l6efe62DdTHT73i9e75TqbFe9VSv4IhFEjQsgm2dNuPS9pvXvKJrXQRRhVC/8AhLTcnXe07FJxtA6YKEVe+bw6wn8EQr3vCWOYh/RcfThsLe3/NB5Q9pzS4js+PdU8/D5PR9VLv+XTMW2L7/l0oH343Z+GvWNPP+PpoNjTD3lKR/C1ffen/xrC7znSxhyl35PLX4S/CH8R/n0ufxH+IvxF+Pe5HIjwfywDXP2Wb5baAAAAAElFTkSuQmCC" alt="W3Schools.com" width="50" height="50"><a href="tel:123-456-7890p123">CLICK TO CALL</a><span class="form-info">  +60 0195779948</span><br>
                <img src="https://www.clipartmax.com/png/middle/302-3027144_email-with-circle-svg-png-icon-free-download-mail-icon-png-circle.png"  width="50" height="50"><a href=mailto:<nowiki>  MovRent246@gmail.com</a>
               </div>
               
                   <!-- second grid -->
           <div>        
             <form action="" method="POST" autocomplete="off">
               <input type="text" name='Name' placeholder="Your Name" required>
               <input type="text" name='Phone' placeholder="Phone Number"><br>
               <input type="Email" name='Email' placeholder="Email" required><br>
               <input type="text" name='Subject' placeholder="Subject of this message"><br>
               <textarea name="message" placeholder="Message" rows="5" required></textarea><br>
               <input type='hidden' name='Act' value='contact'/>
               <input type='submit' class="submit" id='submit' value='Submit'>
             </form>   
               </div>
             </div>
           </div>
<?php
     }
     else
     {
       $json = json_encode(_DATA_);
       $func->mailing($json);
     }
     echo "</section>";
   }

   ?>
         
     