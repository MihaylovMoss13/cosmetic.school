import Head from "next/head"
import Link from "next/link"
import Image from "next/image"
import Slider from "react-slick"
import Header from "../components/header"
import CourseItem from "../components/course-item"

import {
  Carousel,
  CarouselIndicators,
  CarouselItem,
  CarouselCaption,
  CarouselControl,
  Col,
  Collapse,
  Container,
  Card,
  CardHeader,
  CardImg,
  CardBody,
  CardText,
  UncontrolledDropdown,
  Button,
  Row,
  DropdownToggle,
  DropdownMenu,
  DropdownItem
} from "reactstrap"

import styles from "../styles/Home.module.css"

export default function Home() {
  var settings = {
    arows: false,
    dots: true,
    infinite: false,
    speed: 500,
    slidesToShow: 3.5,
    slidesToScroll: 1,
    initialSlide: 0,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2.5,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          arows: false,
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          arows: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  };
  return (
    <div>
      <Header></Header>
      <div className="mb-5 mt-5" style={{ height: "90px" }}></div>
      
      <div className="container-md mt-5 mb-5 pb-5">
        <h2 className="text-center mb-5">Ближайшее обучение</h2>
        <Row>
          <Slider {...settings}>
            <div>
              <CourseItem type="card-type--offline"
                          subtitle="Курс косметологии"
                          title="Курс косметик - эстетист"
                          typeName="Оффлайн"
                          dateStart="1 - 4 мая"
                          summ="112 500 руб."
                          time="576 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
            <div>
              <CourseItem type="card-type--offline"
                          subtitle="Курс косметологии"
                          title="СЕСТРИНСКОЕ ДЕЛО в косметологии"
                          typeName="Оффлайн"
                          dateStart="1 - 4 мая"
                          summ="152 000 руб."
                          time="288 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/3-f7f4732c5b5bf3377642a63925ade43a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
            <div>
              <CourseItem type="card-type--offline"
                          subtitle="Курс косметологии"
                          title="Курс косметик - эстетист"
                          typeName="Оффлайн"
                          dateStart="1 - 4 мая"
                          summ="112 500 руб."
                          time="576 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
            <div>
              <CourseItem type="card-type--master-class"
                          subtitle="Курс косметологии"
                          title="Курс косметик - эстетист"
                          typeName="Мастер-класс"
                          dateStart="1 - 4 мая"
                          summ="112 500 руб."
                          time="576 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
          </Slider>
        </Row>
      </div>
      
      <div className="container-fluid bg-light pt-5 pb-5">
        <div className="container-md">
          <div className="row">
            <div className="col-12 col-sm-6">&nbsp;</div>
            <div className="col-12 col-sm-6">
              <h1>Школа косметологии</h1>
              <h2>ВЕДУЩИЙ УЧЕБНЫЙ ЦЕНТР ЭСТЕТИЧЕСКОЙ КОСМЕТОЛОГИИ</h2>
              <p>Описание может быть любое.</p>
              <p>Ведущий учебный центр эстетической косметологии. </p>
              <p>Более 5 лет мы проводим курсы сертифицированные курсы профессионального образования в области косметологии и индустрии красоты, здоровья и молодости.</p>
            </div>
          </div>
        </div>
      </div>

      <div className="section--training-cosmetologs container-md pt-5 pb-5">
        <div className="row">
          <h2 className="text-center mb-5 mt-5">Обучение косметологов</h2>
            <div className="d-flex flex-wrap">
              <div className="col-md-8 col-sm-6 col-12">
                <div className="card bg-dark text-white">
                  <CardImg src="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                        className="card-img"
                        alt=""
                  />
                  <div className="card-img-overlay d-flex flex-wrap align-items-center">
                    <h5 className="w-100 text-uppercase card-title">курсы косметологии</h5>
                    <ul className="mt-3 card-text">
                      <li>эстетическая косметология</li>
                      <li>инъекционная косметология</li>
                      <li>лазерная косметология</li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div className="col-md-4 col-sm-6 col-12">
                <div className="card bg-dark text-white">
                  <CardImg src="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                        class="card-img"
                        alt=""
                  />
                  <div class="card-img-overlay d-flex align-items-end">
                    <h5 class="card-title text-uppercase">мастер-классы</h5>
                  </div>
                </div>
              </div>
            </div>
            <div className="d-flex flex-wrap">
              <div className="col-lg-4 col-sm-6 col-12">
                <div className="card bg-dark text-white">
                  <CardImg src="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                        className="card-img"
                        alt=""
                  />
                  <div className="card-img-overlay d-flex flex-wrap align-items-end">
                    <h5 className="w-100 text-uppercase card-title">мастер-классы</h5>
                  </div>
                </div>
              </div>
              <div className="col-lg-4 col-sm-6 col-12">
                <div className="card bg-dark text-white">
                  <CardImg src="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                        className="card-img"
                        alt=""
                  />
                  <div className="card-img-overlay d-flex flex-wrap align-items-start">
                    <h5 className="w-100 text-uppercase card-title">расписание</h5>
                  </div>
                </div>
              </div>
              <div className="col-lg-4 col-sm-6 col-12">
                <div className="card bg-dark text-white">
                  <CardImg src="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                        className="card-img"
                        alt=""
                  />
                  <div className="card-img-overlay d-flex flex-wrap align-items-end">
                    <h5 className="w-100 text-uppercase card-title">Акции</h5>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      
      <div className="container-fluid bg-light pt-5 pb-5">
        <div className="container-md">
          <div className="row">
            <div className="col-12 col-sm-6">
              <h2 className="mb-5">ВЕДЕМ НАБОР МОДЕЛЕЙ</h2>

              <div className="mt-3 mb-5">
                <p>Мы предлагаем свои услуги для моделей.</p>
                <p>Выберите процедуру или несколько процедур и наш менеджер проконсультирует вас и назовет ближайшую дату, когда вы сможете получить эту процедуру.</p>
              </div>

              <Link href="/">
                <a className="btn bg-primary text-white">
                  Стать моделью
                </a>
              </Link>
            </div>
            <div className="col-12 col-sm-6">&nbsp;</div>
          </div>
        </div>
      </div>

      <div className="container-md mt-5 mb-5 pb-5">
        <h2 className="text-center mb-5">Специальные предложения</h2>
        <Row>
          <Slider {...settings}>
            <div>
              <CardImg src="../public/images/sales-1.jpeg" />
            </div>
            <div>
              <CourseItem type="card-type--offline"
                          subtitle="Курс косметологии"
                          title="СЕСТРИНСКОЕ ДЕЛО в косметологии"
                          typeName="Оффлайн"
                          dateStart="1 - 4 мая"
                          summ="152 000 руб."
                          time="288 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/3-f7f4732c5b5bf3377642a63925ade43a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
            <div>
              <CourseItem type="card-type--offline"
                          subtitle="Курс косметологии"
                          title="Курс косметик - эстетист"
                          typeName="Оффлайн"
                          dateStart="1 - 4 мая"
                          summ="112 500 руб."
                          time="576 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
            <div>
              <CourseItem type="card-type--master-class"
                          subtitle="Курс косметологии"
                          title="Курс косметик - эстетист"
                          typeName="Мастер-класс"
                          dateStart="1 - 4 мая"
                          summ="112 500 руб."
                          time="576 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </div>
          </Slider>
        </Row>
      </div>
      
      <Head>
        <title>Create Next App</title>
        <meta name="description" content="Generated by create next app" />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <main className={styles.main}>
        <h1 className={styles.title}>
          Welcome to <a href="https://nextjs.org">Next.js!</a>
        </h1>

        <p className={styles.description}>
          Get started by editing{' '}
          <code className={styles.code}>pages/index.js</code>
        </p>

        <div className={styles.grid}>
          <a href="https://nextjs.org/docs" className={styles.card}>
            <h2>Documentation &rarr;</h2>
            <p>Find in-depth information about Next.js features and API.</p>
          </a>

          <a href="https://nextjs.org/learn" className={styles.card}>
            <h2>Learn &rarr;</h2>
            <p>Learn about Next.js in an interactive course with quizzes!</p>
          </a>

          <a
            href="https://github.com/vercel/next.js/tree/canary/examples"
            className={styles.card}
          >
            <h2>Examples &rarr;</h2>
            <p>Discover and deploy boilerplate example Next.js projects.</p>
          </a>

          <a
            href="https://vercel.com/new?utm_source=create-next-app&utm_medium=default-template&utm_campaign=create-next-app"
            className={styles.card}
          >
            <h2>Deploy &rarr;</h2>
            <p>
              Instantly deploy your Next.js site to a public URL with Vercel.
            </p>
          </a>
        </div>
      </main>

      <footer className={styles.footer}>
        <a
          href="https://vercel.com?utm_source=create-next-app&utm_medium=default-template&utm_campaign=create-next-app"
          target="_blank"
          rel="noopener noreferrer"
        >
          Powered by{' '}
          <span className={styles.logo}>
            <Image src="/vercel.svg" alt="Vercel Logo" width={72} height={16} />
          </span>
        </a>
      </footer>
    </div>
  )
}
