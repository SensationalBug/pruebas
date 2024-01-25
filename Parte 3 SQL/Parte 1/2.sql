--Tablas para la consulta
--select * from Sales.SalesOrderDetail
--select * from Production.Product

--Solucion
select top(1) P.ProductID, P.name, SUM(OrderQty) as Total from Sales.SalesOrderDetail as S
inner join Production.Product as P on S.ProductID = P.ProductID
group by P.ProductID, P.name order by Total desc
