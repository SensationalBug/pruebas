--Tablas para la consulta
--select * from Sales.SalesOrderHeader
--select * from Sales.SalesOrderDetail
--select * from Sales.SalesTerritory

--Solucion
select ST.TerritoryID, SOH.SalesOrderID, ST.Name from Sales.SalesOrderHeader as SOH
inner join Sales.SalesTerritory as ST on SOH.TerritoryID = ST.TerritoryID
inner join Sales.SalesOrderDetail as SOD on SOH.SalesOrderID = SOD.SalesOrderID
group by SOH.SalesOrderID, ST.TerritoryID, ST.Name order by ST.TerritoryID asc