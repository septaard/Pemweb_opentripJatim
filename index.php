<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/icon.png" />
    <title>Dashboard-YurioJavaTrip</title>
    <link rel="stylesheet" href="css/Lanstyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .carousel-container {
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-card {
            flex: 0 0 auto;
            margin-right: 20px;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #333;
            padding: 10px;
            z-index: 100;
        }

        .carousel-button.next {
            right: 0;
        }

        .carousel-button.prev {
            left: 0;
        }

        .carousel-track {
            animation: slide 1s forwards;
        }

        @keyframes slide {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(0%);
            }
        }

        .btn_getStarted {
            padding: 10px 18px;
            border: none;
            border-radius: 10px;
            background-color: #21b1f900;
            /* Warna latar belakang */
            color: #000000;
            /* Warna teks */
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
            /* Hilangkan garis bawah pada tautan */
            display: inline-block;
            /* Agar elemen berperilaku seperti tombol */
        }

        .btn_getStarted:hover {
            background-color: #2a80e2;
            /* Warna latar belakang saat hover */
            color: #fff;
            /* Warna teks saat hover */
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="assets/logo.png" alt="" />
            </div>
            <input type="checkbox" id="click" />
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#" class="btn_login"></a></li>
            </ul>
        </nav>
    </header>
    <div class="walpaper">
        <div class="walpaper-text">
            <h1>YurioJavaTrip</h1>
            <p> Rencanakan Liburan Anda Segera </p>
            <a style="text-decoration: none;" href="login.php" class="btn_getStarted">Get Started</a>
        </div>
        <div class="walpaper-img active">
            <img src="assets/download (1).jpeg" alt="gambar 1" />
        </div>
        <!-- <div class="walpaper-img">
                    <img src="assets/pantai.png" alt="Gambar 2" />
                </div>
                <div class="walpaper-img">
                    <img src="assets/image.png" alt="Gambar 3" />
                </div> -->
    </div>
    <div class="carousel-container">
        <div class="carousel-track" id="carouselTrack">
            <!-- Carousel items will be added here dynamically -->
        </div>
        <button class="carousel-button prev"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-button next"><i class="fas fa-chevron-right"></i></button>
    </div>

    <h2>Popular Destinations</h2>
    <div class="container">

        <main>


            <div class="cards-categories">
                <div class="card-categories" id="destinationCards">
                </div>
            </div>
        </main>

    </div>
    <footer>
        <h4>&copy; 2024 YurioJavaTrip. Hak cipta dilindungi undang-undang</h4>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const wallpapers = document.querySelectorAll('.walpaper-img');
            let currentWallpaper = 0;

            function showWallpaper(index) {
                wallpapers[currentWallpaper].classList.remove('active');
                currentWallpaper = index;
                wallpapers[currentWallpaper].classList.add('active');
            }

            function nextWallpaper() {
                const nextIndex = (currentWallpaper + 1) % wallpapers.length;
                showWallpaper(nextIndex);
            }

            setInterval(nextWallpaper, 5000);
        });
        document.addEventListener("DOMContentLoaded", function () {
            const destinations = [
                {
                    name: "kawah Ijen",
                    image: "assets/kawah ijen.png",
                    description: "Gunung Ijen memiliki ketinggian 2.386 mdpl. Kawah Gunung Ijen terkenal dengan fenomena Blue Fire. Lokasinya masuk ke dalam wilayah administrasi Kabupaten Banyuwangi dan Bondowoso.3 Hari 2 Malam, Meeting Point Pasuruan",
                    price: "30,000"
                },
                {
                    name: "Bromo Tengger Semeru",
                    image: "assets/tiket-masuk-wisata-gunung-bromo-20220716075301.jpg",
                    description: "sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang.",
                    price: "15,000"
                },
                {
                    name: "Tumpak Sewu",
                    image: "assets/tmpksw.png",
                    description: "Waduk Perning adalah sebuah waduk yang terletak di Kabupaten Nganjuk, Jawa Timur. Waduk ini memiliki luas 767 hektare dan berfungsi sebagai sumber irigasi, pembangkit listrik tenaga air (PLTA), dan objek wisata.",
                    price: "10,000"
                },
                {
                    name: "Air Terjun madakaripura",
                    image: "assets/madakaripura.png",
                    description: "Air terjun dengan ketinggian 200 meter ini dinyatakan sebagai yang tertinggi di Pulau Jawa. Lokasinya, berada di lembah sempit yang dikelilingi tebing curam, sehingga membuat pesona air terjun ini tak terkalahkan.",
                    price: "10,000"
                },
                {
                    name: "Taman Nasional Baluran",
                    image: "assets/baluran.png",
                    description: "Sebutan Little Africa in Java melekat pada Taman Nasional Baluran. Saat  ke sini, kamu akan langsung merasakan vibes layaknya di Afrika.Banyak hewan yang bisa kamu temui di sini seperti kerbau, banteng, hingga rusa. Tak hanya itu, Savana Bekol membuat kawasan ini menjadi makin terasa di Afrika dengan hamparan padang rumput keringnya.",
                    price: "10,000"
                }
            ];

            const destinationCardsContainer = document.getElementById("destinationCards");
            const carouselTrack = document.getElementById("carouselTrack");

            // Function to create destination card
            function createDestinationCard(destination) {
                const card = document.createElement("div");
                card.classList.add("card");

                const cardImage = document.createElement("div");
                cardImage.classList.add("card-image");
                const image = document.createElement("img");
                image.src = destination.image;
                image.alt = destination.name;
                cardImage.appendChild(image);

                const cardContent = document.createElement("div");
                cardContent.classList.add("card-content");

                const name = document.createElement("h5");
                name.textContent = destination.name;

                const description = document.createElement("p");
                description.classList.add("description");
                description.textContent = destination.description;

                const price = document.createElement("p");
                price.classList.add("price");
                price.innerHTML = `<span>Starting from Rp.</span>${destination.price}`;

                const bookButton = document.createElement("button");
                bookButton.classList.add("btn_belanja");
                bookButton.setAttribute("type", "submit");
                bookButton.textContent = "Book Now";

                cardContent.appendChild(name);
                cardContent.appendChild(description);
                cardContent.appendChild(price);
                cardContent.appendChild(bookButton);

                card.appendChild(cardImage);
                card.appendChild(cardContent);

                return card;
            }

            // Populate destination cards
            destinations.forEach(destination => {
                const card = createDestinationCard(destination);
                destinationCardsContainer.appendChild(card);
            });

            // Populate carousel track
            destinations.forEach(destination => {
                const carouselItem = createDestinationCard(destination);
                carouselTrack.appendChild(carouselItem.cloneNode(true));
            });

            const carouselItems = document.querySelectorAll(".carousel-card");
            const numItems = carouselItems.length;
            const track = document.querySelector('.carousel-track');
            let currentIndex = 0;

            function showSlide(index) {
                if (index < 0) {
                    currentIndex = numItems - 1;
                } else if (index >= numItems) {
                    currentIndex = 0;
                }
                const itemWidth = carouselItems[0].getBoundingClientRect().width;
                track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
            }

            function nextSlide() {
                currentIndex++;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex--;
                showSlide(currentIndex);
            }

            document.querySelector('.carousel-button.prev').addEventListener('click', prevSlide);
            document.querySelector('.carousel-button.next').addEventListener('click', nextSlide);

        });
    </script>
</body>

</html>