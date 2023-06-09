USE [GOCHO_PRE_PRODUCCION]
GO

/****** Object:  Table [dbo].[IVR_G8_INFO_CLINICAS]    Script Date: 29/05/2023 4:28:02 p. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[IVR_G8_INFO_CLINICAS] (
  [inf_cli_id] [int] NOT NULL,
	[inf_cli_cod_esp] [int] NOT NULL,
	[inf_cli_cedula_medico] [varchar](100) NOT NULL,
	[inf_cli_nomb_esp] [varchar](100) NULL,
	[inf_cli_nomb_medico] [varchar](100) NULL,
	[inf_cli_lugar_facturacion] [varchar](255) NULL,
	[inf_cli_observacion] [varchar](255) NULL,
	[inf_cli_validacion] [varchar](255) NULL,
	[inf_cli_lugar_atencion] [varchar](255) NULL,
	) ON [PRIMARY]
GO
