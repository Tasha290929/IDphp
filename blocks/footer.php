<div id="contact">
    <div class="footer">
        <div class="c-hold">
            <div class="ccard">
                <div class="black">
                    <a href="#" onclick="slowScroll('#main')"><img class="black_img" src="<?php echo $img ?>black.png"></a>
                    <br><br><br>
                    <p id="currentDateTime"></p>

                    <script>
                        /**
                         * This code snippet is a JavaScript function that updates the current date and time on a web page.
                         * It uses the Date object to get the current date and time, and then formats it using the toLocaleDateString method.
                         * The formatted date and time is then inserted into an HTML element with the id "currentDateTime".
                         * The function is called once immediately to display the initial date and time, and then it is called every second using setInterval to update the date and time continuously.
                         */
                        function updateDateTime() {
                            var currentDate = new Date();
                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                                timeZoneName: 'short'
                            };
                            var formattedDateTime = currentDate.toLocaleDateString('en-US', options);
                            document.getElementById("currentDateTime").innerHTML = formattedDateTime;
                        }
                        updateDateTime();

                        setInterval(updateDateTime, 1000);
                    </script>
                </div>
            </div>
            <div class="ccard">
                <div class="contact-section">
                    <h2>Contact Us</h2>
                    <br>
                    <p>Email: <a href="mailto:example@example.com">example@example.com</a></p>
                    <p>Phone: +1 123-456-7890</p>
                    <br><br>
                    <h3>Follow our Socials</h3><br>
                    <img src="<?php echo $img ?>t.png" alt="out telegram">
                    <img src="<?php echo $img ?>f.png" alt="our facebook">
                </div>
            </div>

            <div class="ccard">
                <h2>Our Partners</h2>
                <br>
                <div class="partners">
                    <img src="<?php echo $img ?>p1.png" alt="Image 1">
                    <img src="<?php echo $img ?>p2.png" alt="Image 1">
                    <img src="<?php echo $img ?>p3.png" alt="Image 1">
                    <img src="<?php echo $img ?>p4.png" alt="Image 1">
                    <img src="<?php echo $img ?>p5.png" alt="Image 1">
                    <img src="<?php echo $img ?>p6.png" alt="Image 1">
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>