import Head from 'next/head'
import Link from 'next/link'
import { useEffect, useState } from 'react'
import { useRouter } from 'next/router'
import Image from 'next/image'
import CourseItem from '../components/course-item'
import 'bootstrap/dist/css/bootstrap.min.css'

import {
  Nav,
  NavItem,
  NavbarText,
  NavLink,
  Navbar,
  NavbarBrand,
  NavbarToggler,
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
} from 'reactstrap'

import styles from '../styles/Home.module.css'

export default function Courses() {
  
  const [courses, setCources] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch('http://localhost/api/courses');
      const data = await response.json();
      setCources(data);
      courses(data);
    }

    fetchData();
  }, []);

  return (
    <div>
      <Navbar
        color="light"
        expand="lg"
        fixed="top"
        light
      >
        <NavbarBrand>
            <Link href="/">
                <a className='navbar-brand'>Школа косметологии</a>
            </Link>
        </NavbarBrand>
        <NavbarToggler onClick={function noRefCheck(){}} />
        <Collapse navbar>
          <Nav
            className="me-auto"
            navbar
          >
            <UncontrolledDropdown
              inNavbar
              nav
            >
              <DropdownToggle
                caret
                nav
              >
                Курсы обучения
              </DropdownToggle>
              <DropdownMenu right>
                <DropdownItem>
                  Option 1
                </DropdownItem>
                <DropdownItem>
                  Option 2
                </DropdownItem>
                <DropdownItem divider />
                <DropdownItem>
                  Reset
                </DropdownItem>
              </DropdownMenu>
            </UncontrolledDropdown>
            <NavItem>
              <NavLink href="https://github.com/reactstrap/reactstrap">
                Вебинары
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
                Видео-уроки
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
              Блог
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
              О нас
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
              Прайс
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
              Рассписание
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
              Акции
              </NavLink>
            </NavItem>
            <NavItem>
              <NavLink href="/">
                Контакты
              </NavLink>
            </NavItem>
          </Nav>
          <NavbarText>
            8 (800) 508-62-42
          </NavbarText>
        </Collapse>
      </Navbar>
      <Container style={{ padding: 100 }}>
        <h1 className='mb-4'>Курсы обучения</h1>
        <Row>
          <Col>
            <Link href="/kursy">
              <a>
                <Card>
                  <CardImg
                    alt="Card image cap"
                    src="https://picsum.photos/318/180"
                    top
                    width="100%"
                  />
                  <CardHeader>Канюльные техники</CardHeader>
                  <CardBody>
                      <CardText>Курс для медиков</CardText>
                      <CardText>Bootstrap 4 power!</CardText>
                      <Button color="danger">OK</Button>
                  </CardBody>
                </Card>
              </a>
            </Link>
          </Col>
          {courses && courses.map(({ id, name }) => (
            <Col>
              <CourseItem type="card-type--offline"
                          subtitle="Курс косметологии"
                          title={name}
                          typeName="Оффлайн"
                          dateStart={period_date}
                          summ="112 500 руб."
                          time="576 акк. часов"
                          img="https://www.suzan.ru/media/widgetkit/apparatnaya-kosmetologiya-5550410aacc0fbf3092e1531e956e72a.jpg"
                          countUser="2 из 15"
                          linkReg={"/"}
                          linkEnter={"/"}
              />
            </Col>
          ))}
          <Col>
            <Card>
              <CardBody>
                  <CardText>Курс для медиков</CardText>
                  <CardHeader>Канюльные техники</CardHeader>
                  <br/>
                  <CardText>Bootstrap 4 power!</CardText>
                  <Button color="danger">OK</Button>
              </CardBody>
            </Card>
          </Col>
          <Col>
            <Card>
              <CardBody>
                  <CardText>Курс для медиков</CardText>
                  <CardHeader>Канюльные техники</CardHeader>
                  <br/>
                  <CardText>Bootstrap 4 power!</CardText>
                  <Button color="danger">OK</Button>
              </CardBody>
            </Card>
          </Col>
        </Row>
      </Container>
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
