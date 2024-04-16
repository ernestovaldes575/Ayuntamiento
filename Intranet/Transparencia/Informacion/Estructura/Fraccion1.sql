USE [Transparencia]
GO
/****** Object:  Table [dbo].[TTArt92_I]    Script Date: 02/10/2023 21:55:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[TTArt92_I](
	[AAyuntamiento] [char](3) NULL,
	[AEjercicio] [int] NULL,
	[AFechaInicio] [smalldatetime] NULL,
	[AFechaTermino] [smalldatetime] NULL,
	[ATipoNorma] [int] NULL,
	[ATipoNormaOtro] [nvarchar](50) NULL,
	[ADenominacion] [nvarchar](50) NULL,
	[AFechaDOF] [smalldatetime] NULL,
	[AFechaUltima] [smalldatetime] NULL,
	[AHipervinculo] [nvarchar](50) NULL,
	[AAreaResp] [int] NULL,
	[ANota] [nvarchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Ejercicio' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AEjercicio'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Fecha de inicio del periodo que se informa ( formato: "dd/mm/aaaa" ) ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AFechaInicio'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Fecha de término del periodo que se informa ( formato: "dd/mm/aaaa" ) ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AFechaTermino'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Tipo de normatividad' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'ATipoNorma'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'atención: Tipo de normatividad en caso de elegir OTRO llenar este campo' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'ATipoNormaOtro'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Denominación de la norma que se reporta' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'ADenominacion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Fecha de publicación en DOF u otro medio oficial o institucional ( formato: "dd/mm/aaaa" ) ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AFechaDOF'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Fecha de última modificación, en su caso ( formato: "dd/mm/aaaa" ) ' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AFechaUltima'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Hipervínculo al documento de la norma' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AHipervinculo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Área(s) responsable(s) que genera(n), posee(n), publica(n) y actualizan la información' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'AAreaResp'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Nota' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'TTArt92_I', @level2type=N'COLUMN',@level2name=N'ANota'
GO
