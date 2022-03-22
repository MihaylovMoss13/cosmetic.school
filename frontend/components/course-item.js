import Link from "next/link"
import { Col, Card, CardImg, CardBody, Row } from "reactstrap"
  
export default function CourseItem({type, subtitle, title, typeName, dateStart, summ, time, img, countUser, linkReg, linkEnter}) {
    return (
      <Card className={type}>
        <CardBody>
          <Link href=""><a className="card-subtitle">{subtitle}</a></Link>
          <Link href=""><a className="card-title">{title}</a></Link>
          <div className='w-100'>
            <span class="card-badge mt-2 mb-2">{typeName}</span>
          </div>
          <p>{dateStart}</p>
          <Row className="align-items-center">
            <Col>
              <p>Стоимость: <br/>{summ}</p>
              <p>Продолжительность: {time}</p>
            </Col>
            <Col>
              <CardImg
                alt={title}
                src={img}
                top
                width="100%"
              />
            </Col>
          </Row>
          <div className="mt-3 mb-1">Свободно {countUser} мест</div>
        </CardBody>
        <Link href={linkReg}>
          <a className="card-button card-button-registr">Зарегистрироваться</a>
        </Link>
        <Link href={linkEnter}>
          <a className="card-button card-button-enter"> Подробнее</a>
        </Link>
      </Card>
    )
}