<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="container flex flex-col justify-center items-center scroll-behavior-smooth">

    <div class="p-10 flex flex-col gap-6">
        <h1 class="text-4xl font-bold text-center py-4">
            Frequently Asked Questions
        </h1>

        <div class="flex flex-col border-b py-3 max-w-[1000px]">
            <ul class="list-outside">
                <li class="list-disc font-bold ">
                    What is GymBuilder?
                </li>
            </ul>

            <div class="h-full overflow-hidden pl-6 pt-2">
                GymBuilder is an online platform dedicated to providing a wide range of high-quality gym equipment and
                accessories for your fitness needs.
            </div>
        </div>

        <div class="flex flex-col border-b py-3 max-w-[1000px]">
            <ul class="list-outside">
                <li class="list-disc font-bold ">
                    How can I purchase products from GymBuilder?
                </li>
            </ul>

            <div class="h-full overflow-hidden pl-6 pt-2">
                Purchasing from GymBuilder is easy. Simply browse our website, select the products you want, add them to
                your cart, and proceed to checkout. Follow the prompts to provide your payment and shipping information
                to complete the purchase.
            </div>
        </div>

        <div class="flex flex-col border-b py-3 max-w-[1000px]">
            <ul class="list-outside">
                <li class="list-disc font-bold ">
                    What types of gym equipment can I find on GymBuilder?
                </li>
            </ul>

            <div class="h-full overflow-hidden pl-6 pt-2">
                GymBuilder offers a diverse selection of gym equipment, including treadmills, dumbbells, weight benches,
                resistance bands, and more. Our goal is to cater to all aspects of your fitness routine.
            </div>
        </div>

        <div class="flex flex-col border-b py-3 max-w-[1000px]">
            <ul class="list-outside">
                <li class="list-disc font-bold ">
                    How do I track my order from GymBuilder?
                </li>
            </ul>

            <div class="h-full overflow-hidden pl-6 pt-2">
                Once your order is processed and shipped, you will receive a tracking number via email. You can use this
                number to track the status and location of your order through our website or the shipping carrier's
                platform.
            </div>
        </div>

        <div class="flex flex-col border-b py-3 max-w-[1000px]">
            <ul class="list-outside">
                <li class="list-disc font-bold ">
                    What if I have issues with the gym equipment I purchased from GymBuilder?
                </li>
            </ul>

            <div class="h-full overflow-hidden pl-6 pt-2">
                We stand by the quality of our products. If you encounter any issues with your gym equipment, please
                contact our customer support team within 30 days of receiving your order. We will assist you in
                troubleshooting the problem or arranging a replacement if necessary.
            </div>
        </div>
    </div>
</div>


</div>

<?php view("partials/footer.php"); ?>