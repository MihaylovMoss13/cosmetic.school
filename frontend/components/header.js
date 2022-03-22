import Link from "next/link"

import {
    Nav,
    NavItem,
    NavbarText,
    NavLink,
    Navbar,
    NavbarToggler,
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
  } from 'reactstrap';

export default function Header() {
    return (
        <Navbar
            color="light"
            expand="lg"
            fixed="top"
            light
        >
            <Link href="/">
                <a>Школа косметологии</a>
            </Link>
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
                    <Link href="/kursy">
                    <a className="nav-link">Вебинары</a>
                    </Link>
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
    )
}