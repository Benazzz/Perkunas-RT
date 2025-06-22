<?php
if(mail("benastenas9@gmail.com", "Test", "Test body")) {
    echo "Mail sent.";
} else {
    echo "Mail failed.";
}
